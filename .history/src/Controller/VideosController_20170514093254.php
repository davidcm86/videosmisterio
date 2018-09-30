<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Inflector;
use Cake\View\XmlView;
use Cake\Utility\Xml;
use Cake\View\SerializedView;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Http\Client;
use Cake\Network\Http\Response;
use Facebook\Facebook;
use GoogleRankChecker\GoogleRankChecker;

/**
 * Videos Controller
 *
 * @property \App\Model\Table\VideosTable $Videos
 */
class VideosController extends AppController
{
    public $helpers = ['TinyMCE.TinyMCE'];
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['misterio', 'sitemap', 'usuario', 'seoPosicionGoogle']);
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $conditions = $this->buscadorAdmin($this->request->data);
        $this->paginate = [
            'conditions' => [$conditions],
            'contain' => ['Users', 'Categorias'],
            'order' => ['Videos.created desc']
        ];
        $videos = $this->paginate($this->Videos);
        $this->set(compact('videos'));
        $this->set('_serialize', ['videos']);
    }

    // buscador para el index de videos en la administracion
    private function buscadorAdmin($data) {
        $conditions = array();
        if (!empty($data['titulo'])) {
            $conditions[] = array('Videos.titulo LIKE' => '%' . $data['titulo'] . '%');
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => ['Users', 'Categorias']
        ]);

        $this->set('video', $video);
        $this->set('_serialize', ['video']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $video = $this->Videos->newEntity();
        if ($this->request->is('post')) {
            $video = $this->Videos->patchEntity($video, $this->request->data);
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Videos->Users->find('list', ['limit' => 200]);
        $categorias = $this->Videos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('video', 'usuarios', 'categorias'));
        $this->set('_serialize', ['video']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // evitamos la validación para el error del modelo y comprobar el enalce
            $video = $this->Videos->patchEntity($video, $this->request->data, ['validate' => false]);
            // partimos ruta del iframe para guardar solo el http y que no de el fallo el tinyMCE
            if (!empty($video->libro_afiliado_1) || !empty($video->libro_afiliado_2)) {
                $video = $this->getIframeSrc($video);
            }  
            if ($this->Videos->save($video)) {
                $videoEditado = $this->Videos->find('all', [
                    'conditions' => ['Videos.id' => $id],
                    'fields' => ['Videos.titulo', 'Videos.descripcion', 'Videos.created', 'Videos.enlace', 'Videos.publicado', 'Videos.id', 'Videos.slug_titulo', 'Videos.keyword_seo']
                    ])->first();
                    if ($videoEditado->publicado == 1) {
                        $this->scrapeFacebook($videoEditado);
                        //$this->subirPublicacionFacebook($videoEditado);
                    }
                    // bajamops la calidad de la imagen
                    $year = date('Y', strtotime($videoEditado->created));
                    $imagen = WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year . DS . $videoEditado->id . '.jpg';
                    if (file_exists($imagen)) {
                        exec('jpegoptim -m 50 ' . $imagen);
                    }
                // recuperamos el video de nuevo para los cambios que puedan haber
                $this->Flash->success(__('The video has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }
		$this->set(compact('usuarios','categorias','video'));
        $usuarios = $this->Videos->Users->find('list', ['keyField' => 'id', 'valueField' => 'username']);
        $categorias = $this->Videos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nombre']);
        $this->set(compact('video', 'usuarios', 'categorias'));
        $this->set('_serialize', ['video']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // mostramos la página del video pinchado
    public function misterio($slugVideo = null)
    {
        $esAmp = false;
        // si amp....
        if (isset($this->request->params['slug']) && !empty($this->request->params['slug'])) {
            $slugVideo = $this->request->params['slug'];
            $this->viewBuilder()->layout('amp');
            $esAmp = true;
        }
        if (!$esAmp) $this->viewBuilder()->layout('publico');
        
        $slugVideoLower = strtolower($slugVideo);
        if ($slugVideo != $slugVideoLower) {
            // significa que nos pasan un slug con mayusculas, debemos hacer canonical al slug con mayusculas
            $this->redirect('http://' . $_SERVER['SERVER_NAME'] . DS . 'videos' . DS . 'misterio' . DS . $slugVideoLower, 301);
            //$this->set('canonical', 'http://' . $_SERVER['SERVER_NAME'] . DS . 'videos' . DS . 'misterio' . DS . $slugVideoLower);
        }
        $video = $this->Videos->find('all', [
            'conditions' => ['Videos.slug_titulo' => $slugVideo, 'Videos.publicado' => 1],
            'contain' => ['Users', 'Categorias'],
            'fields' => ['Users.username', 'Users.id', 'Videos.titulo', 'Videos.descripcion', 'Videos.created', 'Videos.enlace', 'Videos.description','Videos.modified',
                        'Videos.keywords', 'Videos.id', 'Categorias.nombre', 'Categorias.id', 'Categorias.alias', 'Videos.libro_afiliado_1', 'Videos.libro_afiliado_2',
                         'Videos.slug_titulo']
            ])->first();
        if(empty($video)){
            return $this->redirect(array('controller' => 'pages', 'action' => 'index'), 301);
		}
        if ($esAmp) { // quitamos style para quen no falle el amp
            $video->descripcion = str_replace('style="text-decoration:underline;"',"",$video->descripcion);
            $video->descripcion = str_replace('style="text-decoration:underline"',"",$video->descripcion);
            $video->descripcion = str_replace('style="text-decoration: underline;"',"",$video->descripcion);
            $video->descripcion = str_replace('_blanck',"_blank",$video->descripcion);
            $video->descripcion = str_replace('style="padding-left: 30px;"',"",$video->descripcion);
        }
        $encuesta = $this->getEncuesta($video->categoria->id);
        $this->set('encuesta', $encuesta);
        $this->set('video', $video);
        $numPaginateCategorias = $this->calcularNumeroCategoriasMostrar($video->descripcion, $video->libro_afiliado_1, $video->libro_afiliado_2);
        $this->metaDatosVideo($video);
        $conditionCategoria = array('Videos.categoria_id' => $video->categoria->id);
        // si es otra categoria, puesto que no vamos a tener tantos videos como en ovnis. Meter los videos de esa categoria y luego rellenar
        $videosRandom = $this->Videos->find('all', [
            'conditions' => [
                $conditionCategoria,
                'Videos.publicado' => 1, 
                'NOT' => ['Videos.slug_titulo' => $slugVideo]
                ],
            'order' => 'rand()', 
            'fields' => ['Videos.titulo', 'Videos.descripcion', 'Videos.created', 'Videos.enlace', 'Videos.id', 'Videos.slug_titulo'],
            'limit' => 12
        ])->toArray();
        if (count($videosRandom) < 12) {
            $limitRellenar = 12 - count($videosRandom);
            $videosCategoriaRandom = $this->Videos->find('all', [
                'conditions' => [
                    'Videos.publicado' => 1, 
                    'NOT' => ['Videos.slug_titulo' => $slugVideo, 'Videos.categoria_id' => $video->categoria->id]
                    ],
                'order' => 'rand()', 
                'fields' => ['Videos.titulo', 'Videos.descripcion', 'Videos.created', 'Videos.enlace', 'Videos.id', 'Videos.slug_titulo', 'Videos.keyword_seo'],
                'limit' => $limitRellenar
            ])->toArray();
            $videosRandom = array_merge($videosRandom, $videosCategoriaRandom);
        }
        foreach ($videosRandom as $key => $videoRandom) {
            $tamanioDescription = 140;
            if (strlen($videoRandom->titulo) > 34) $tamanioDescription = 100;
            $this->set('tamanioDescription', $tamanioDescription);
            $videosRandom[$key]->tamanioDescription = $tamanioDescription;
        }
        if ($esAmp) { // quitamos style para quen no falle el amp
            foreach ($videosRandom as $key => $videoRandom) {
                $videosRandom[$key]->descripcion = str_replace('style="text-decoration:underline;"',"",$videoRandom->descripcion);
            }
        }
        $this->set('videosRandom', $videosRandom);
        $this->set('tituloH1', $video->titulo);
        $rutaImagen = '/img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg';
        $this->set('rutaImagen', $rutaImagen);
        $fechaCreacion = date('Y-m-d', strtotime($video->created));
        $fechaModificacion = date('Y-m-d', strtotime($video->modified));
        // coger categorias random
        $categoriasRandom = $this->Videos->Categorias->find('all', [
            'order' => 'rand()', 
            'fields' => ['Categorias.nombre', 'Categorias.alias'],
            'limit' => $numPaginateCategorias
            ])->toArray();
        $this->set('categoriasRandom', $categoriasRandom);
        $jsonld = \JsonLd\Context::create('article', [
            'name' => $video->titulo,
            'url' => null,
            'description' => $video->description,
            'image' => [
                'url' => 'https://' . $_SERVER['SERVER_NAME'] . '/img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg',
                'height' => '1280',
                'width' => '416',
                'caption' => $video->titulo 
            ],
            'thumbnailUrl' => 'https://' . $_SERVER['SERVER_NAME'] . '/img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg',
            'text' => null,
            'publisher' => [
                    'name' => 'Videos de Misterio',
                    'logo' => 'https://' . $_SERVER['SERVER_NAME'] . '/img/thumbnails/' . date('Y', strtotime($video->created)) . '/' . $video->id . '.jpg'
                    ],
            'dateCreated' => $fechaCreacion . 'T08:00:00+08:00',
            'dateModified' => $fechaModificacion . 'T09:20:00+08:00',
            'datePublished' => $fechaCreacion . 'T08:00:00+08:00',
            'author' => 'Videos de Misterio',
            //'articleBody' => null,
            //'articleSection' => null,
            'mainEntityOfPage' => [
                'WebPage' => [
                    '@context' => 'http://schema.org',
                    '@url' => 'https://videosmisterio.com/',
                    '@id' => 'https://videosmisterio.com/'
                    ]
            ],
            'headline' => $video->titulo
        ]);
        $this->set('jsonld', $jsonld);
        $this->set('robots', 'index,follow');
        $this->set('videoAmp', true);
        if ($esAmp) $this->render('misterio_amp');
    }



    /* Los videos subidos de un usuario */
    public function usuario($idUsuario) {
        $this->viewBuilder()->layout('publico');
        $conditions = array('Users.id' => $idUsuario, 'Videos.publicado' => 1);
        $this->paginate = [
            'conditions' => [$conditions],
            'contain' => ['Users', 'Categorias'],
            'fields' => ['Videos.titulo', 'Videos.created', 'Videos.titulo', 'Categorias.nombre', 'Categorias.alias', 'Videos.slug_titulo'],
            'order' => ['Videos.created desc']
        ];
        $videos = $this->paginate($this->Videos);
        $this->loadModel('Users');
        $user = $this->Users->get($idUsuario, [
            'fields' => ['Users.username', 'Users.url_web', 'Users.url_facebook', 'Users.url_youtube', 'Users.url_twitter']
        ]);
        $this->set('user', $user);
        $this->set('videos', $videos);
        $conditions = array('Videos.user_id' => $idUsuario, 'Videos.publicado' => 1);
        $countVideos = $this->Videos->find('all', ['conditions' => $conditions])->count();
        $this->set('countVideos', $countVideos);
        $title_for_layout = __('Videos de misterio de ' . $user->username);
        $description_for_layout = __('Estos son todos los videos de misterio que ha subido ' . $user->username);
        $this->set('title_for_layout',$title_for_layout);
        $this->set('description_for_layout',$description_for_layout);
        $keywords = 'videos misterio subidor '  . $user->username;
        $this->set('keywords',$keywords);
        $this->set('tituloH1', "Videos de misterio de " . $user->username);
    }

    /* Sube tu video de misterio*/
    public function subeTuVideoDeMisterio()
    {
        $this->viewBuilder()->layout('publico');
        $subirVideo = $this->Videos->newEntity();
        if ($this->request->is('post')) {
            if ($this->Auth->user('id')) {
                $this->request->data['user_id'] = $this->Auth->user('id');
			    $this->request->data['slug_titulo'] = strtolower(Inflector::slug($this->request->data['titulo'],'-'));
                $urlEnlace = $this->request->data['enlace'];
                $this->request->data['enlace_completo'] = $this->request->data['enlace'];
                $this->request->data['enlace'] = $this->obtenerEnlaceYoutube($this->request->data['enlace']);
                $this->request->data['descripcion'] = strip_tags($this->request->data['descripcion']);
            }
            $subirVideo = $this->Videos->patchEntity($subirVideo, $this->request->data);
            if ($this->Videos->save($subirVideo)) {
                // recuperar ultimo video y salvar imagen
                $videoSubido = $this->Videos->find('all', [
                    'conditions' => ['Videos.slug_titulo' => $this->request->data['slug_titulo']],
                    'fields' => ['Videos.id', 'Videos.enlace', 'Videos.created', 'Videos.slug_titulo', 'Videos.descripcion', 'Videos.titulo']
                    ])->first();                
                $year = date('Y', strtotime($videoSubido->created));
                if (!file_exists(WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year)) {
                    mkdir(WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year, 0777);
                }
                $image = "http://img.youtube.com/vi/" . $videoSubido->enlace . "/0.jpg";
                copy($image, WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year . DS .$videoSubido->id . '.jpg');
                shell_exec("jpegoptim -m 40 " . WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year . DS .$videoSubido->id . '.jpg');
                // hacemos scrape del video de facebook
                $this->Flash->publicosuccess(__('El video ha sido subido correctamente. Revisaremos el contenido y en breve podrá ser publicado.'), [
                    'params' => [
                        'class' => 'alert alert-success'
                    ]
                ]);
                return $this->redirect(['action' => 'sube_tu_video_de_misterio']);
            } else {
                // devolvemos el enlace fallido
                $this->request->data['enlace'] = $urlEnlace;
                $this->Flash->publicoerror(__('El video no ha podido ser subido. Revise los campos del formulario.'), [
                    'params' => [
                        'class' => 'alert alert-error'
                    ]
                ]);
            }
        }
        $categorias = $this->Videos->Categorias->find('list', [
            'keyField' => 'id', 
            'valueField' => 'nombre', 
            'order' => 'nombre'
            ]
        );
        $this->set(compact('subirVideo', 'categorias'));
        $this->set('_serialize', ['video']);
        // metadatos
        $title_for_layout = __('Sube tu video de misterio');
        $description_for_layout = __('Sube tu video de misterio desde cualquier video de youtube');
        $this->set('title_for_layout',$title_for_layout);
        $this->set('description_for_layout',$description_for_layout);
        $keywords = 'subir video misterio';
        $this->set('keywords',$keywords);
        $this->set('tituloH1', "Sube tu video de misterio");
    }

    /* Listado de los videos que ha subido el usuario*/
    public function misVideos()
    {
        $this->viewBuilder()->layout('publico');
        if ($this->Auth->user('id')) {
            $this->paginate = [
                    'conditions' => ['Videos.user_id' => $this->Auth->user('id')],
                    'fields' => ['Videos.id', 'Videos.titulo', 'Videos.enlace', 'Videos.created', 'Videos.slug_titulo'],
                    'order' => ['Videos.created DESC'],
                    'limit' => 10
            ];
        }
        $videos = $this->paginate($this->Videos);
        $this->set(compact('videos'));
        $this->set('_serialize', ['videos']);
        // metadatos
        $title_for_layout = __('Mis videos de misterio subidos');
        $description_for_layout = __('Mis videos de misterio subidos');
        $this->set('title_for_layout',$title_for_layout);
        $this->set('description_for_layout',$description_for_layout);
        $keywords = 'mis videos video misterio';
        $this->set('keywords',$keywords);
        $this->set('tituloH1', "Mis videos de misterio subidos");
    }

    // mandamos los metadatos necesarios a la vista del video
    private function metaDatosVideo($video)
    {
        $title_for_layout = __($video->titulo);
		//Hacemos esto para que en la description de los metas no aparezcan los <strong></strong> pero si aparezcan en la descripción del video
		$description_for_layout = strip_tags($video->descripcion);
		$description_for_layout = substr($description_for_layout, 0, 155);
		$description_for_layout .= '...';
        if (isset($video->description) && !empty($video->description)) {
            $description_for_layout = $video->description;
        }
        $this->set('description_for_layout', $description_for_layout);
        if (!empty($video->keywords)) {
			$this->set('keywords', $video->keywords);
		} else {
			$this->set('keywords', 'video caso misterio');
		}
		$title_for_layout = __($video->titulo);
        $this->set('title_for_layout', $title_for_layout);
        $this->set('compartirRedesSociales', $_SERVER['REQUEST_URI']);
        // snippets
	  	$this->set('snippetTitle', $video->titulo);
	  	// tenemos la descripcion sin los strong
	  	$this->set('snippetDescription', $description_for_layout);
        $year = date('Y', strtotime($video->created));
        $snippetEnlaceImagen = 'http://' . $_SERVER['SERVER_NAME'] . '/webroot/img/thumbnails/' . $year . '/' . $video->id . '.jpg';
        if (!file_exists(WWW_ROOT . 'img/thumbnails/' . $year . '/' . $video->id . '.jpg')) {
            $snippetEnlaceImagen = 'http://' . $_SERVER['SERVER_NAME'] . '/webroot/img/banner-rip-image.jpg';
        }
        $this->set('snippetEnlaceImagen', $snippetEnlaceImagen);
        $this->set('urlAcesso', $_SERVER['REQUEST_URI']);
        if (isset($video->categoria['nombre']) && !empty($video->categoria['nombre'])) $this->set('tagVideo', $video->categoria['nombre']);
    }

    /* Obtenemos el enlace de la url de youtube */
    private function obtenerEnlaceYoutube($enlace)
    {
		$enlaceInsertar = explode('/',$enlace);
		if(isset($enlaceInsertar[3])){
			$tamanio = strlen($enlaceInsertar[3]);
		}else{
			return $enlaceInsertar = "";
		}
		
		if(isset($enlaceInsertar[3]) && !empty($enlaceInsertar[3]) && $tamanio < 28){
			//Esto significa que nos llega una url del tipo: http://youtu.be/WdmBAlIBdv8			
			$urlVideo = explode('=',$enlaceInsertar[3]);
			if (isset($urlVideo) && !empty($urlVideo[1])) {
				return $urlVideo[1];
			}
			
			return $enlaceInsertar[3];
		}else{
			//Nos llega una url del tipo: http://www.youtube.com/watch?v=BVZ2u8xQ_nM&feature=share 
			$enlaceInsertar1 = explode('=',$enlace);
			$enlaceInsertar2 = explode('&',$enlaceInsertar1[1]);
									
			if(!empty($enlaceInsertar2)){				
				return $enlaceInsertar2[0];
			}else{
				//Cualquier otro texto nos da fallo,por lo que devolvemos vacio
				return $enlaceInsertar = "";
			}
		}
	}

    // sitemap del sitio
    public function sitemap()
    {
        $this->viewBuilder()->layout('ajax');
        $videos = $this->Videos->find('all', [
	    	'conditions' => ['Videos.publicado' => 1],
	    	'fields' => ['Videos.titulo', 'Videos.slug_titulo','Videos.modified']
            ]
	    );
        $this->set('videos', $videos);
        $this->RequestHandler->respondAs('xml');
    }

    /* Calculamos el número de palabras en la cadena para mostrar + o - categorias y que cuadre la altura */
    private function calcularNumeroCategoriasMostrar($descripcionVideo, $libroAfiliado1, $libroAfiliado2)
    {
        $num = str_word_count($descripcionVideo);
        if ($num < 55) {
            $numCategorias = 9;
        } elseif ($num >= 50 && $num <= 75) {
            $numCategorias = 10;
        } elseif ($num > 75 && $num <= 100) {
            $numCategorias = 11;
        } elseif ($num > 100 && $num <= 130) {
            $numCategorias = 12;
        } elseif ($num > 130 && $num <= 160) {
            $numCategorias = 13;
        } elseif ($num > 160 && $num <= 200) {
            $numCategorias = 14;
        } elseif ($num > 200 && $num <= 250) {
            $numCategorias = 15;
        } elseif ($num > 250 && $num <= 300) {
            $numCategorias = 16;
        } else {
            $numCategorias = 17;
        }
        // restamos 6 categorias para mostrar
        if (!empty($libroAfiliado1) && !empty($libroAfiliado2)) {
            $numCategorias = $numCategorias - 6;
        } elseif (!empty($libroAfiliado1) || !empty($libroAfiliado2)) {
            //$numCategorias = $numCategorias - 1;
        }
        return $numCategorias;
    }

    /* Hacemos el scrape de facebook para que se vea bien en la red */
    public function scrapeFacebook($videoEditado)
    {
        $http = new Client();
        $response = $http->get('https://graph.facebook.com/');
        $data = array("id" => "http://" . $_SERVER['SERVER_NAME'] . "/videos/misterio/$videoEditado->slug_titulo", "scrape" => true);
        $http->post('https://graph.facebook.com/', $data); // POST request
        $http->delete('https://graph.facebook.com/'); 
    }

    public function seoPosicionGoogle($clave = null) {
        if ($clave != 'david99' ) exit;
        require_once(ROOT .DS. "vendor" . DS  . "seo" . DS . "RankChecker.php");
        $seo = new GoogleRankChecker;
       /* if($_SERVER['SERVER_ADDR'] == '127.0.0.1') {
            $this->redirect('/');
        }*/
        $videos = $this->Videos->find('all',  [
            'conditions' => ['publicado' => 1, ['keyword_seo IS NOT' => null], ['keyword_seo IS NOT' => '']],
            'fields' => ['Videos.titulo', 'Videos.slug_titulo', 'Videos.keyword_seo']
        ])->toArray();
        $useproxies = false;
        $arrayproxies = [];
        foreach ($videos as $video) {
            $this->log($video);
            $googledatas = $seo->find($video->keyword_seo, $useproxies, $arrayproxies);
            if (isset($googledata['url'])) {
                foreach ($googledatas as $key => $googledata) {
                    $posicion = strpos($googledata['url'], 'videosmisterio.com');
                    if (isset($posicion) && $posicion > 0) {
                        $rank = $key + 1; // el indice va un numero menor que rank, se suma. ya que todo el array el rank que devuelve es de distintas paginas y vuelve al cero
                        $this->guardarInfoSeo($video->slug_titulo, $video->keyword_seo, $rank);
                    }
                }
            }
        }
        $this->autoRender = false;
    }
    /* Guardamos el rank de la posicion que devuelve el buscar el titulo */
    private function guardarInfoSeo($slugVideo, $keywordSeo, $posicionRank) {
        $this->loadModel('Seo');
        $guardarSeo = $this->Seo->newEntity();
        $videoBuscado = $this->Seo->find('all', [
            'conditions' => ['Seo.slug_video' => $slugVideo]
        ])->toArray();
        if (empty($videoBuscado)) {
            $guardarVideoSeo = array(
                'keywords_video' => $keywordSeo,
                'slug_video' => $slugVideo,
                'posicion_hoy' => $posicionRank,
                'fecha_hoy' => date('Y-m-d 00:00:00'),
                'fecha_ayer' => date('Y-m-d 00:00:00', strtotime( '-1 days' ))
            );
            $guardarVideoSeo = $this->Seo->patchEntity($guardarSeo, $guardarVideoSeo);
            if(!$this->Seo->save($guardarVideoSeo)) {
                $this->log('Problema al guardar el video nuevo seo');
            } else {
                $this->log('Hemos guardado');
                $this->log($guardarVideoSeo);
            }
        } else {
            $guardarEditarVideoSeo = array(
                'posicion_hoy' => $posicionRank,
                'posicion_ayer' => $videoBuscado['0']->posicion_hoy,
                'fecha_hoy' => date('Y-m-d 00:00:00'),
                'fecha_ayer' => date('Y-m-d 00:00:00', strtotime( '-1 days' ))
            );
            $query = $this->Seo->query();
            $query->update()
                ->set([
                    'posicion_hoy' => $posicionRank,
                    'posicion_ayer' => $videoBuscado['0']->posicion_hoy,
                    'fecha_hoy' => date('Y-m-d 00:00:00'),
                    'fecha_ayer' => date('Y-m-d 00:00:00', strtotime( '-1 days' ))
                    ])
                ->where(['id' => $videoBuscado['0']->id])
                ->execute();
        }
        return true;
    }

    // Cogemos solo la ruta del src del iframe
    private function getIframeSrc($video) {
        if (!empty($video->libro_afiliado_1)) {
            preg_match('@src="([^"]+)"@', $video->libro_afiliado_1, $cadena);
            $src = array_pop($cadena);
            // puede que no se ponga el iframe y este solo el enlace
            if (!empty($src)) {
                $video->libro_afiliado_1 = $src;
            }        }
        if (!empty($video->libro_afiliado_2)) {
            preg_match('@src="([^"]+)"@', $video->libro_afiliado_2, $cadena2);
            $src2 = array_pop($cadena2);
            // puede que no se ponga el iframe y este solo el enlace
            if (!empty($src2)) {
                $video->libro_afiliado_2 = $src2;
            }
        }
        return $video;
    }

    /* Publicamos en la pag oficial de facebook de VideosMisterio */
    public function subirPublicacionFacebook($videoEditado)
    {
        $this->log('1');
        $pageAccessToken = '12f9b287bea8d48ab54d928997322e6c';
        $pageId = '567534933358679';
        $year = date('Y', strtotime($videoEditado->created));
        $data['picture'] = "http://" . $_SERVER['SERVER_NAME'] . "/webroot/img/thumbnails/" . $year . "/" . $videoEditado->id . ".jpg";
        $data['link'] = "http://" . $_SERVER['SERVER_NAME'] . "/videos/misterio/" . $videoEditado->slug_titulo;
        $data['message'] = $videoEditado->descripcion;
        $data['caption'] = $videoEditado->titulo;
        $data['description'] = $videoEditado->descripcion;
        $data['access_token'] = $pageAccessToken;
        $this->log('2');
        $http = new Client();
        //$response = $http->get('https://graph.facebook.com/' . $pageId . '/feed');
        $response = $http->get('https://graph.facebook.com/oauth/access_token?client_id=567534933358679&client_secret=12f9b287bea8d48ab54d928997322e6c&grant_type=client_credentials');
        $this->log($response->body);
        //$response2 = $http->get('https://graph.facebook.com/567534933358679?feed&' . $response->body);
        //$http->post('https://graph.facebook.com/' . $pageId . '/feed', $data); // POST request
        $response2 = $http->post('https://graph.facebook.com/feed?message=Hellofans&' . $response->body);
        $this->log('------------');
        $this->log($response2);
        //$http->delete('https://graph.facebook.com/' . $pageId . '/feed'); 
        $this->log('3');
    }

    // Obtenemos una encuesta relacionada copn la categoria
    private function getEncuesta($categoriaId) {
        $this->loadModel('Encuestas');
        $encuesta['encuesta'] = $this->Encuestas->find('all', [
            'conditions' => [ 'Encuestas.activo' => 1, 'Encuestas.categoria_id' =>  $categoriaId],
            'order' => 'rand()', 
            'limit' => '1'
        ])->first();
        if (empty($encuesta)) {
            return false;
        }
        $listPreguntas = array();
        if (!empty($encuesta['encuesta']->pregunta_radio_0)) {
            $listPreguntas[] = $encuesta['encuesta']->pregunta_radio_0;
        }
        if (!empty($encuesta['encuesta']->pregunta_radio_1)) {
            $listPreguntas[] = $encuesta['encuesta']->pregunta_radio_1;
        }
        if (!empty($encuesta['encuesta']->pregunta_radio_2)) {
            $listPreguntas[] = $encuesta['encuesta']->pregunta_radio_2;
        }
        if (!empty($encuesta['encuesta']->pregunta_radio_3)) {
            $listPreguntas[] = $encuesta['encuesta']->pregunta_radio_3;
        }
        $encuesta['listPreguntas'] = $listPreguntas; 
        return $encuesta;
    }
}
