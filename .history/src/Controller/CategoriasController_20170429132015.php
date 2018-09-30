<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Inflector;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('listado');
    }

    public $paginate = [
        'limit' => 20,
        'order' => [
            'Categorias.nombre' => 'asc'
        ]
    ];

    /* Listado de las categorias*/
    public function listado()
    {
        $this->viewBuilder()->layout('publico');
        $this->set('tituloH1', "Listado de temas de misterio");
        $categorias = $this->Categorias->find('all', [
            'order' => 'nombre'
        ])->toArray();
        $this->set('categorias', $categorias);
        // metadatos
        $title_for_layout = __('Listado de temas de misterio');
        $description_for_layout = __('Categorías de misterio mostrando videos relacionados con lo imposible y lo que está sin resolver');
        $this->set('title_for_layout',$title_for_layout);
        $this->set('description_for_layout',$description_for_layout);
        $keywords = 'categorias de misterio';
        $this->set('keywords',$keywords);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $categorias = $this->paginate($this->Categorias);

        $this->set(compact('categorias'));
        $this->set('_serialize', ['categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Videos']
        ]);

        $this->set('categoria', $categoria);
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['alias'] = Inflector::slug($this->request->data['nombre'], '-');
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('The categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The categoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
