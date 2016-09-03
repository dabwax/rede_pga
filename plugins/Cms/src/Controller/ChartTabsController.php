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
            $tmp = json_decode($chartTab->actors);

            $tmp2 = [];
            
            foreach ($tmp as $key => $value) {
                $explode = explode("_", $value);
                
                $entity = TableRegistry::get($explode[1]);
                $entity = $entity->get($explode[0]);

                $tmp2[] = $entity;
            }

            $chartTab->actors = $tmp2;
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

        if ($this->request->is('post')) {
            $this->request->data['actors'] = json_encode($this->request->data['actors']);
            $chartTab = $this->ChartTabs->patchEntity($chartTab, $this->request->data);
            if ($this->ChartTabs->save($chartTab)) {
                $this->Flash->success(__('The chart tab has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart tab could not be saved. Please, try again.'));
            }
        }
        $users = $this->ChartTabs->Users->find('list', ['limit' => 200]);

        $actors = $this->formatarAtores();

        $this->set(compact('actors', 'chartTab', 'users'));
        $this->set('_serialize', ['chartTab']);
    }

    public function formatarAtores()
    {
        $actorsList = $this->getAtores();
        $actors = [];

        foreach ($actorsList as $model => $entities) {
            foreach($entities as $entity) {
                $index = $entity->id . '_' . $model;

                $role = $entity->role;

                if(!empty($role)) {
                    $label = $entity->full_name . ' (' . $this->formatarCargo($role) . ')';

                    $actors[$index] = $label;
                }
            }
            # code...
        }

        return $actors;
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
        $actors = $this->formatarAtores();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['actors'] = json_encode($this->request->data['actors']);

            $chartTab = $this->ChartTabs->patchEntity($chartTab, $this->request->data);
            if ($this->ChartTabs->save($chartTab)) {
                $this->Flash->success(__('The chart tab has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart tab could not be saved. Please, try again.'));
            }
        } else {
            $chartTab->actors = json_decode($chartTab->actors);
        }
        $users = $this->ChartTabs->Users->find('list', ['limit' => 200]);
        $this->set(compact('chartTab', 'users', 'actors', 'chartsRelated'));
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
        $chartTab = $this->ChartTabs->get($id);
        if ($this->ChartTabs->delete($chartTab)) {
            $this->Flash->success(__('The chart tab has been deleted.'));
        } else {
            $this->Flash->error(__('The chart tab could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
