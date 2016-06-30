<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ChartTabs Controller
 *
 * @property \Cms\Model\Table\ChartTabsTable $ChartTabs */
class ChartTabsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $estudanteAtual = $this->estudanteAtual();

        $where = [
            'ChartTabs.user_id' => $estudanteAtual['id']
        ];
        $chartTabs = $this->ChartTabs->find()->where($where)->all()->toArray();

        $charts = TableRegistry::get("Charts");

        foreach($chartTabs as $chartTab) {
            $tmp = json_decode($chartTab->charts_related);
            $where = [
                'Charts.id IN' => $tmp
            ];
            $tmp = $charts->find()->where($where)->all()->toArray();

            $chartTab->graficos = $tmp;
        }

        $this->set(compact('chartTabs'));
        $this->set('_serialize', ['chartTabs']);
    }

    /**
     * View method
     *
     * @param string|null $id Chart Tab id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chartTab = $this->ChartTabs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('chartTab', $chartTab);
        $this->set('_serialize', ['chartTab']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chartTab = $this->ChartTabs->newEntity();

        $estudanteAtual = $this->estudanteAtual();

        $chartTab->user_id = $estudanteAtual['id'];

        $chartsRelated = [];

        $charts = TableRegistry::get("Charts");

        $where = [
            'Charts.user_id' => $estudanteAtual['id']
        ];
        $tmp = $charts->find()->where($where)->all()->toArray();

        foreach($tmp as $t) {
            $chartsRelated[$t->id] = $t->name . ' - ' . $t->subname;
        }

        if ($this->request->is('post')) {
            $this->request->data['charts_related'] = json_encode($this->request->data['charts_related']);
            $chartTab = $this->ChartTabs->patchEntity($chartTab, $this->request->data);
            if ($this->ChartTabs->save($chartTab)) {
                $this->Flash->success(__('The chart tab has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart tab could not be saved. Please, try again.'));
            }
        }
        $users = $this->ChartTabs->Users->find('list', ['limit' => 200]);
        $this->set(compact('chartTab', 'users', 'chartsRelated'));
        $this->set('_serialize', ['chartTab']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chart Tab id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estudanteAtual = $this->estudanteAtual();
        $chartTab = $this->ChartTabs->get($id, [
            'contain' => []
        ]);
        $chartsRelated = [];

        $charts = TableRegistry::get("Charts");

        $tmp = json_decode($chartTab->charts_related);

        $chartTab->charts_related = $tmp;
        $where = [
            'Charts.user_id' => $estudanteAtual['id']
        ];
        $tmp = $charts->find()->where($where)->all()->toArray();

        foreach($tmp as $t) {
            $chartsRelated[$t->id] = $t->name . ' - ' . $t->subname;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {


            $this->request->data['charts_related'] = json_encode($this->request->data['charts_related']);

            $chartTab = $this->ChartTabs->patchEntity($chartTab, $this->request->data);
            if ($this->ChartTabs->save($chartTab)) {
                $this->Flash->success(__('The chart tab has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart tab could not be saved. Please, try again.'));
            }
        }
        $users = $this->ChartTabs->Users->find('list', ['limit' => 200]);
        $this->set(compact('chartTab', 'users', 'chartsRelated'));
        $this->set('_serialize', ['chartTab']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chart Tab id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chartTab = $this->ChartTabs->get($id);
        if ($this->ChartTabs->delete($chartTab)) {
            $this->Flash->success(__('The chart tab has been deleted.'));
        } else {
            $this->Flash->error(__('The chart tab could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
