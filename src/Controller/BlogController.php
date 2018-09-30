<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Inflector;

/**
 * Blog Controller
 *
 * @property \App\Model\Table\BlogTable $Blog
 */
class BlogController extends AppController
{
    public $helpers = ['TinyMCE.TinyMCE'];
    public function initialize() {
        parent::initialize();
        $this->loadComponent('FuncionesGenerales');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $blog = $this->paginate($this->Blog);

        $this->set(compact('blog'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blog = $this->Blog->get($id, [
            'contain' => []
        ]);

        $this->set('blog', $blog);
        $this->set('_serialize', ['blog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blog->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['imagen']['tmp_name']) && !empty($this->request->data['imagen']['tmp_name'])) {
                $this->request->data['imagen'] = $this->FuncionesGenerales->guardarImagen($this->request->data['imagen']['tmp_name'], $this->request->data['imagen']['name'], 'img/portadas-blog');
            }
            if (empty($this->request->data['slug'])) {
                $this->request->data['slug'] = strtolower(Inflector::slug($this->request->data['nombre']));
            }
            $blog = $this->Blog->patchEntity($blog, $this->request->data);
            if ($this->Blog->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blog could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Categorias');
        $categorias = $this->Categorias->find('list', [
            'keyField' => 'id', 
            'valueField' => 'nombre', 
            'order' => 'nombre'
        ]);
        $this->set(compact('blog', 'categorias'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['imagen']['tmp_name']) && !empty($this->request->data['imagen']['tmp_name'])) {
                $this->request->data['imagen'] = $this->FuncionesGenerales->guardarImagen($this->request->data['imagen']['tmp_name'], $this->request->data['imagen']['name'], 'img/portadas-blog', $id);
            } else {
                // quitamos la imagen para que no lo meta vacio
                unset($this->request->data['imagen']);
            }
            if (empty($this->request->data['slug'])) {
                $this->request->data['slug'] = strtolower(Inflector::slug($this->request->data['nombre']));
            }
            $blog = $this->Blog->patchEntity($blog, $this->request->data);
            if ($this->Blog->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blog could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Categorias');
        $categorias = $this->Categorias->find('list', [
            'keyField' => 'id', 
            'valueField' => 'nombre', 
            'order' => 'nombre'
        ]);
        $this->set(compact('blog', 'categorias'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blog->get($id);
        if (isset($blog->imagen) && !empty($blog->imagen)) {
            if (file_exists(WWW_ROOT . $blog->imagen)) {
                unlink(WWW_ROOT . $blog->imagen);
            }
        }
        if ($this->Blog->delete($blog)) {
            $this->Flash->success(__('The blog has been deleted.'));
        } else {
            $this->Flash->error(__('The blog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
