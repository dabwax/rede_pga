<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Instituitions Controller
 *
 * @property \Cms\Model\Table\InstituitionsTable $Instituitions
 */
class InstituitionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('instituitions', $this->paginate($this->Instituitions));
        $this->set('_serialize', ['instituitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Instituition id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $instituition = $this->Instituitions->get($id, [
            'contain' => ['Schools', 'Users']
        ]);
        $this->set('instituition', $instituition);
        $this->set('_serialize', ['instituition']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $instituition = $this->Instituitions->newEntity();
        if ($this->request->is('post')) {
            $instituition = $this->Instituitions->patchEntity($instituition, $this->request->data);
            if ($this->Instituitions->save($instituition)) {
                $this->Flash->success(__('The instituition has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituition could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('instituition'));
        $this->set('_serialize', ['instituition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Instituition id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $instituition = $this->Instituitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $instituition = $this->Instituitions->patchEntity($instituition, $this->request->data);
            if ($this->Instituitions->save($instituition)) {
                $this->Flash->success(__('The instituition has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The instituition could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('instituition'));
        $this->set('_serialize', ['instituition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Instituition id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instituition = $this->Instituitions->get($id);
        if ($this->Instituitions->delete($instituition)) {
            $this->Flash->success(__('The instituition has been deleted.'));
        } else {
            $this->Flash->error(__('The instituition could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
