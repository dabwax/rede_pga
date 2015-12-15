<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Protectors Controller
 *
 * @property \Cms\Model\Table\ProtectorsTable $Protectors
 */
class ProtectorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();

        $query = $this->Protectors->find()->contain(['Users'])->where(
        [
            'Protectors.user_id' => $current_user_selected['id']
        ]);

        $this->set('protectors', $this->paginate($query));
        $this->set('_serialize', ['protectors']);
    }

    /**
     * View method
     *
     * @param string|null $id Protector id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $protector = $this->Protectors->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('protector', $protector);
        $this->set('_serialize', ['protector']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();

        $protector = $this->Protectors->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {
            $protector = $this->Protectors->patchEntity($protector, $this->request->data);
            if ($this->Protectors->save($protector)) {
                $this->Flash->success(__('The protector has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The protector could not be saved. Please, try again.'));
            }
        }
        $users = $this->Protectors->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('protector', 'users'));
        $this->set('_serialize', ['protector']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Protector id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $protector = $this->Protectors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $protector = $this->Protectors->patchEntity($protector, $this->request->data);
            if ($this->Protectors->save($protector)) {
                $this->Flash->success(__('The protector has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The protector could not be saved. Please, try again.'));
            }
        }
        $users = $this->Protectors->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('protector', 'users'));
        $this->set('_serialize', ['protector']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Protector id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $protector = $this->Protectors->get($id);
        if ($this->Protectors->delete($protector)) {
            $this->Flash->success(__('The protector has been deleted.'));
        } else {
            $this->Flash->error(__('The protector could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
