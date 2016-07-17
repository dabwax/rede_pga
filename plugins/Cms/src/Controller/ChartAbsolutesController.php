<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * ChartAbsolutes Controller
 *
 * @property \Cms\Model\Table\ChartAbsolutesTable $ChartAbsolutes */
class ChartAbsolutesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Inputs']
        ];
        $chartAbsolutes = $this->paginate($this->ChartAbsolutes);

        $this->set(compact('chartAbsolutes'));
        $this->set('_serialize', ['chartAbsolutes']);
    }

    /**
     * View method
     *
     * @param string|null $id Chart Absolute id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chartAbsolute = $this->ChartAbsolutes->get($id, [
            'contain' => ['Users', 'Inputs']
        ]);

        $this->set('chartAbsolute', $chartAbsolute);
        $this->set('_serialize', ['chartAbsolute']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chartAbsolute = $this->ChartAbsolutes->newEntity();

        $estudanteAtual = $this->estudanteAtual();
        $chartAbsolute->user_id = $estudanteAtual['id'];

        if ($this->request->is('post')) {
            $chartAbsolute = $this->ChartAbsolutes->patchEntity($chartAbsolute, $this->request->data);
            if ($this->ChartAbsolutes->save($chartAbsolute)) {
                $this->Flash->success(__('The chart absolute has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart absolute could not be saved. Please, try again.'));
            }
        }
        $users = $this->ChartAbsolutes->Users->find('list', ['limit' => 200]);
        $inputs = $this->ChartAbsolutes->Inputs->find('list', ['limit' => 200])->where(['Inputs.user_id' => $estudanteAtual['id'], 'Inputs.type IN' => ['escala_numerica', 'numero', 'intervalo_tempo'] ]);
        $this->set(compact('chartAbsolute', 'users', 'inputs'));
        $this->set('_serialize', ['chartAbsolute']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chart Absolute id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chartAbsolute = $this->ChartAbsolutes->get($id, [
            'contain' => []
        ]);

        $estudanteAtual = $this->estudanteAtual();
        $chartAbsolute->user_id = $estudanteAtual['id'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $chartAbsolute = $this->ChartAbsolutes->patchEntity($chartAbsolute, $this->request->data);
            if ($this->ChartAbsolutes->save($chartAbsolute)) {
                $this->Flash->success(__('The chart absolute has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart absolute could not be saved. Please, try again.'));
            }
        }
        $users = $this->ChartAbsolutes->Users->find('list', ['limit' => 200]);
        $inputs = $this->ChartAbsolutes->Inputs->find('list', ['limit' => 200])->where(['Inputs.user_id' => $estudanteAtual['id'], 'Inputs.type IN' => ['escala_numerica', 'numero', 'intervalo_tempo'] ]);
        $this->set(compact('chartAbsolute', 'users', 'inputs'));
        $this->set('_serialize', ['chartAbsolute']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chart Absolute id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $chartAbsolute = $this->ChartAbsolutes->get($id);
        if ($this->ChartAbsolutes->delete($chartAbsolute)) {
            $this->Flash->success(__('The chart absolute has been deleted.'));
        } else {
            $this->Flash->error(__('The chart absolute could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
