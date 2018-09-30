<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Encuestas Controller
 *
 * @property \App\Model\Table\EncuestasTable $encuestas
 */
class EncuestasController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['guardarVotacionEncuesta', 'listado']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias']
        ];
        $encuestas = $this->paginate($this->Encuestas);
        $this->set(compact('encuestas'));
        $this->set('_serialize', ['encuestas']);
    }

    /**
     * View method
     *
     * @param string|null $id Encuesta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $encuesta = $this->Encuestas->get($id, [
            'contain' => ['Categorias'],
        ]);
        $this->set('encuesta', $encuesta);
        $this->set('_serialize', ['encuesta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $encuesta = $this->Encuestas->newEntity();
        if ($this->request->is('post')) {
            $encuesta = $this->Encuestas->patchEntity($encuesta, $this->request->data);
            if ($this->Encuestas->save($encuesta)) {
                $this->Flash->success(__('The Encuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Encuesta could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Encuestas->Categorias->find('list', [
            'keyField' => 'id',
            'valueField' => 'nombre',
            'order' => ['nombre']
            ]);
        $this->set(compact('encuesta', 'categorias'));
        $this->set('_serialize', ['encuesta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Encuesta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $encuesta = $this->Encuestas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $encuesta = $this->Encuestas->patchEntity($encuesta, $this->request->data);
            if ($this->Encuestas->save($encuesta)) {
                $this->Flash->success(__('The Encuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Encuesta could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Encuestas->Categorias->find('list', [            
            'keyField' => 'id',
            'valueField' => 'nombre',
            'order' => ['nombre']]);
        $this->set(compact('encuesta', 'categorias'));
        $this->set('_serialize', ['encuesta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Encuesta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $encuesta = $this->Encuestas->get($id);
        if ($this->Encuestas->delete($encuesta)) {
            $this->Flash->success(__('The Encuesta has been deleted.'));
        } else {
            $this->Flash->error(__('The Encuesta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // guardamos la votación de la encuesta
    public function guardarVotacionEncuesta() {
        $this->Cookie->time = 86400;  // or '1 hour'
        // guardamos cookie con la votación hecha
		$ipCliente = $this->request->clientIp();
		$hash = $ipCliente . $this->request->data['idEncuesta'];
        if ($this->Cookie->read($hash)) {
			$datos['mensaje'] = "Vuelve a votar en 24h.";	
			$datos['estado']  = 0;
		} else {
			$this->Cookie->write($hash, true);
            $encuestaGet = $this->Encuestas->get($this->request->data['idEncuesta'], ['conditions' => ['Encuestas.id' => $this->request->data['idEncuesta']]])->toArray(); // Return article with id 12
            $totalSumaRespuesta = $encuestaGet['resultado_radio_' . $this->request->data['respuestaEncuesta']];
            $totalSumaRespuesta = $totalSumaRespuesta +1;
            /*$dataEncuesta = array(
                'resultado_radio_' . $this->request->data['respuestaEncuesta'] => $totalSumaRespuesta
            );*/
            $encuestaGet['resultado_radio_' . $this->request->data['respuestaEncuesta']] = $totalSumaRespuesta;
            // ahora los pasamos de nuevo a objeto para poderlo guardar
            $encuestaGet = $this->Encuestas->newEntity($encuestaGet);
            $encuestaGet->id = $this->request->data['idEncuesta']; 
            if(!$this->Encuestas->save($encuestaGet)) {
                $this->log('Error al salvar Encuesta json');
            }
            $totalVotosEncuesta = $encuestaGet->resultado_radio_0 + $encuestaGet->resultado_radio_1 +  $encuestaGet->resultado_radio_2 + $encuestaGet->resultado_radio_3;
            // una vez sabiendo el total...calculamos %
            if (!empty($encuestaGet->pregunta_radio_0)) $datos['resultado_radio_0_porcentaje'] = round($encuestaGet->resultado_radio_0 * 100 / $totalVotosEncuesta, 1);
            if (!empty($encuestaGet->pregunta_radio_1)) $datos['resultado_radio_1_porcentaje'] = round($encuestaGet->resultado_radio_1 * 100 / $totalVotosEncuesta, 1);
            if (!empty($encuestaGet->pregunta_radio_2)) $datos['resultado_radio_2_porcentaje'] = round($encuestaGet->resultado_radio_2 * 100 / $totalVotosEncuesta, 1);
            if (!empty($encuestaGet->pregunta_radio_3)) $datos['resultado_radio_3_porcentaje'] = round($encuestaGet->resultado_radio_3 * 100 / $totalVotosEncuesta, 1);
            $datos['totalVotos'] = $totalVotosEncuesta;
            $datos['resultado_radio_0'] = $encuestaGet->resultado_radio_0;
            $datos['resultado_radio_1'] = $encuestaGet->resultado_radio_1;
            $datos['resultado_radio_2'] = $encuestaGet->resultado_radio_2;
            $datos['resultado_radio_3'] = $encuestaGet->resultado_radio_3;
            $datos['estado'] = 1;
        }
		$this->set('datos', $datos);	
		$this->set('_serialize', array('datos'));
    }

    public function listado() {
        $this->viewBuilder()->layout('publico');
        $encuestas = $this->getEncuestas();
        $this->set('encuestas', $encuestas);
        $title_for_layout = __('Encuestas de misterio y enigmas');
        $description_for_layout = __('Vota en nuestras encuestas de misterio y enigmas y comparte tu opinión');
        $this->set('title_for_layout',$title_for_layout);
        $this->set('description_for_layout',$description_for_layout);
        $keywords = 'encuestas misterio y enigmas';
        $this->set('keywords',$keywords);
        $this->set('tituloH1', "Encuestas de misterio");
    }

    // Obtenemos todas las categorias
    private function getEncuestas() {
        $this->loadModel('Encuestas');
        $encuestas = $this->Encuestas->find('all', [
            'conditions' => ['Encuestas.activo' => 1],
            'order' => 'rand()'
        ])->toArray();
        if (empty($encuestas)) {
            return false;
        }
        foreach ($encuestas as $encuesta) {
            $listPreguntas = array();
            if (!empty($encuesta->pregunta_radio_0)) {
                $listPreguntas[] = $encuesta->pregunta_radio_0;
            }
            if (!empty($encuesta->pregunta_radio_1)) {
                $listPreguntas[] = $encuesta->pregunta_radio_1;
            }
            if (!empty($encuesta->pregunta_radio_2)) {
                $listPreguntas[] = $encuesta->pregunta_radio_2;
            }
            if (!empty($encuesta->pregunta_radio_3)) {
                $listPreguntas[] = $encuesta->pregunta_radio_3;
            }
            $encuesta['listPreguntas'] = $listPreguntas;
        }
        return $encuestas;
    }
}
