<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Network\Http\Client;
use Cake\Datasource\ConnectionManager;

/**
 * Videos Controller
 *
 * @property \App\Model\Table\VideosTable $Videos
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    // la cuenta de un usuario
    public function miCuenta() {
        $this->viewBuilder()->layout('publico');
        if (!$this->request->session()->read('Auth.User.username')) $this->redirect('/');
        $this->loadModel('Users');
        $this->loadModel('Videos');
        $user = $this->Users->get($this->request->session()->read('Auth.User.id'), [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Videos->patchEntity($user, $this->request->data);
            $this->log($this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Cuenta editada correctamente.'));
            } else {
                $this->Flash->error(__('Ha habido un error al editar su cuenta.'));
            }
        }
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    // listado de los usuarios activos con videos
    public function topUsuarios() {
        $this->viewBuilder()->layout('publico');
        $conn = ConnectionManager::get('default');
        // recuperamos los usuarios con mínimos un video
        $usuariosVideo = $conn->execute('select Users.id, Users.username, count(Users.username) as ContadorVideos from users as Users
            inner join videos as Videos ON Videos.user_id = Users.id
            group by Videos.user_id order by ContadorVideos DESC;');
        $usuariosVideos = $usuariosVideo->fetchAll('assoc');
        $this->set('usuariosVideos', $usuariosVideos);
        $this->log($usuariosVideos);
        $this->set('_serialize', ['usuariosVideos']);
        $title_for_layout = __('Top usuarios subiendo videos de misterio');
        $description_for_layout = __('Estos son los usuarios que más suben videos de misterio');
        $this->set('title_for_layout',$title_for_layout);
        $this->set('description_for_layout',$description_for_layout);
        $keywords = 'top usuarios videos misterio';
        $this->set('keywords',$keywords);
        $this->set('tituloH1', "Top usuarios videos de misterio");
    }

    public $paginate = [
        'limit' => 12,
        'conditions' => [ 'Videos.publicado' => 1 ],
        'order' => [ 'Videos.created' => 'desc' ]
    ];

    public function index($categoriaAlias = null)
    {
        $this->loadModel('Videos');
        $esAmp = false;
        // si amp....
        $this->log($this->request->params);
        if (isset($this->request->params['_ext']) && $this->request->params['_ext'] == 'amp') {
            $this->viewBuilder()->layout('amp');
            $esAmp = true;
        }
        if (!$esAmp) $this->viewBuilder()->layout('publico');
        // paginacion videos
        $categoria = "";
        if (isset($categoriaAlias)) {
            $categoria = $this->Videos->Categorias->findByAlias($categoriaAlias)->first();
            if (!empty($categoria)) {
                $conditions = array('Videos.categoria_id' => $categoria->id);
                $this->set('categoriaNombre', $categoria->nombre);
                $tituloCategoria = $categoria->nombre;
                if (!empty($categoria->title)) {
                    $tituloCategoria = $categoria->title;
                }
                $this->set('categoria', $tituloCategoria);
                $this->set('tituloH1', $tituloCategoria);
            }
        } else {
            $videoDestacado = $this->getVideoDestacado();
            $videoDestacado->created = date('d-m-Y', strtotime($videoDestacado->created));
            // comprobar si tiene imagen o no
            $year = date('Y', strtotime($videoDestacado->created));
            $videoDestacado->image = DS . 'img' . DS . 'thumbnails' . DS . $year . DS . $videoDestacado->id . '.jpg';
            if (!file_exists(WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year . DS . $videoDestacado->id . '.jpg')) {
                $videoDestacado->image = DS . 'img' . DS . 'banner-rip-image.jpg';
            }
            $this->set('videoDestacado', $videoDestacado);
            $conditions = array('NOT' => ['Videos.id' => $videoDestacado->id]);
            $conditions[] = array('NOT' => ['Videos.categoria_id' => '01b52053-5276-4c65-9d9d-de62ae58026b']);
            $conditions[] = array('Videos.publicado' => 1);
        }
        $this->paginate = [
            'conditions' => $conditions,
            'fields' => ['Videos.id', 'Videos.titulo', 'Videos.descripcion', 'Videos.enlace', 'Videos.created', 'Videos.slug_titulo'],
            'order' => ['Videos.created DESC'],
            'limit' => 12
        ];
        $videos = $this->paginate($this->Videos);
        $this->set(compact('videos'));
        $this->set('_serialize', ['videos']);
        // canonical, si no pagina siempre muestra 1
        if ($this->request->params['paging']['Videos']['page'] > 1) {
            // esta paginado
            if(strpos($_SERVER['REQUEST_URI'], 'categoria')) {
                $this->set('canonical', 'http://' . $_SERVER['SERVER_NAME'] . '/categoria/' . $this->request->params['categoriaAlias']);
            } else {
                $this->set('canonical', 'http://' . $_SERVER['SERVER_NAME']);
            }
        }
        $page = $this->request->params['paging']['Videos']['page'];
        $this->metaDatos($page, $categoria);
        $jsonld = \JsonLd\Context::create('web_page', [
            "@context" => "http://schema.org",
            "url" => "https://videosmisterio.com/",
            "description" => "Videos de misterio, ovnis reales, fantasmas , sucesos paranormales, conspiraciones, asesinatos sin resolver...."
            ]);
        $this->set('jsonld', $jsonld);
        $this->set('robots', 'index,follow');
    }

    /* El ultimo video subido será el destacado */
    private function getVideoDestacado()
    {
        // recuperar un video al azar el cual será el más destacado de la página
        $videoDestacado = $this->Videos->find('all', [
            'conditions' => [ 'Videos.publicado' => 1 , 'NOT' => ['Videos.categoria_id' => '01b52053-5276-4c65-9d9d-de62ae58026b']],
            'order' => ['Videos.created DESC'],
            'limit' => '1'
            ]
        )->first();
        return $videoDestacado;
    }

    /*seteamos los parámetros para los metados necesarios*/
    private function metaDatos($page, $categoria = null)
    {
        if (!empty($categoria->nombre)) {
            $categoriaNombre = 'Videos de ' . $categoria->nombre;
            if (isset($categoria->title) && !empty($categoria->title)) $categoriaNombre = $categoria->title;
            $categoriaDescripcion = 'Los mejores videos de ' . $categoria->nombre;
            if (isset($categoria->description) && !empty($categoria->description)) $categoriaDescripcion = $categoria->description;
            // metadatos
            if ($page == 1) $page = "";
            $title_for_layout =  $categoriaNombre . '' . $page;
            $keywords = "videos de " . $categoria->nombre;
            $this->set('description_for_layout', __($categoriaDescripcion . '' . $page, true));
            $this->set(compact('page', 'title_for_layout', 'keywords'));
            $this->set('robots','Index,Follow');
            $this->set('snippetTitle','Videos de '. $categoriaNombre . '' . $page);
            $this->set('snippetDescription', __($categoriaDescripcion . '' . $page, true));
        } else {
            // metadatos
            if ($page == 1) $page = "";
            $title_for_layout = 'Videos casos de misterio - Ovnis reales,extraterrestres '. $page;
            $keywords = "videos misterio,videos de ovnis,videos de ovnis reales";
            $this->set('description_for_layout', __('Videos misterio muestra videos sobre casos de ovnis reales,extraterrestres,conspiraciones,fantasmas,terror,psicofonias,reptilianos,ufos,masoneria...' . $page, true));
            $this->set(compact('page', 'title_for_layout', 'keywords'));
            $this->set('robots','Index,Follow');
            $this->set('snippetTitle','Videos casos de misterio');
            $this->set('snippetDescription', __('Videos misterio muestra videos sobre casos de ovnis reales,extraterrestres,conspiraciones,fantasmas,terror,psicofonias,reptilianos,ufos,masoneria...' . $page, true));
        }
    }

    /* Explicación de que es la página de VideosMisterio */
    public function queEsVideosMisterio()
    {
        $this->viewBuilder()->layout('publico');
        $title_for_layout = '¿Qué es Videos Misterio?';
		$keywords = "que es el video misterio";
		$this->set('description_for_layout', __('Videos misterio muestra videos sobre casos de ovnis reales,extraterrestres,conspiraciones,fantasmas,terror,psicofonias,reptilianos,ufos,masoneria...', true));
		$this->set(compact('page', 'title_for_layout', 'keywords'));
		$this->set('robots','Index,Follow');
        $this->set('snippetTitle','Videos casos de misterio');
        $this->set('snippetDescription', __('Videos misterio muestra videos sobre casos de ovnis reales,extraterrestres,conspiraciones,fantasmas,terror,psicofonias,reptilianos,ufos,masoneria...', true));
        $this->set('tituloH1', "¿Qué es Videos Misterio?");
    }

    /* Política de privacidad de VideosMisterio */
    public function politicaDePrivacidad()
    {
        $this->viewBuilder()->layout('publico');
        $title_for_layout = 'Política de privacidad';
		$keywords = "politica de privacidad video misterio";
		$this->set('description_for_layout', __('politica de privacidad video misterio', true));
		$this->set(compact('page', 'title_for_layout', 'keywords'));
		$this->set('robots','Index,Follow');
        $this->set('snippetTitle','Videos casos de misterio');
        $this->set('snippetDescription', __('politica de privacidad video misterio', true));
        $this->set('tituloH1', "Politica de privacidad video misterio");
    }

    public function video() {
        $this->viewBuilder()->layout('publico');
        $this->loadModel('Videos');
        $this->paginate = [
            'conditions' => ['Videos.categoria_id' => '01b52053-5276-4c65-9d9d-de62ae58026b'],
            'fields' => ['Videos.id', 'Videos.titulo', 'Videos.descripcion', 'Videos.enlace', 'Videos.created', 'Videos.slug_titulo'],
            'order' => ['Videos.created DESC'],
            'limit' => 12
        ];
        $videos = $this->paginate($this->Videos);
        $this->set('categoriaNombre', 'Documentales de misterio');
        $this->set('videos', $videos);
        // canonical, si no pagina siempre muestra 1
		$page = $this->request->params['paging']['Videos']['page'];
        $this->set('canonical', $page);
        $title_for_layout = 'Documentales de misterio';
		$keywords = "documentales de misterio,documentales online";
		$this->set('description_for_layout', __('Videos sobre los mejores documentales de tipo misterio que te hace pensar y plantearte las cosas dos veces antes de pensar en la verdad', true));
		$this->set(compact('page', 'title_for_layout', 'keywords'));
		$this->set('robots','Index,Follow');
        $this->set('snippetTitle','Documentales de misterio');
        $this->set('snippetDescription', __('documentales de misterio', true));
        $this->set('tituloH1', "Documentales de misterio");
    }
}
