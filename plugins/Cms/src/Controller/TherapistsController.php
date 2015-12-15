<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Therapists Controller
 *
 * @property \Cms\Model\Table\TherapistsTable $Therapists
 */
class TherapistsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();

        $query = $this->Therapists->find()->contain(['Users'])->where(
        [
            'Therapists.user_id' => $current_user_selected['id']
        ]);
        
        $this->set('therapists', $this->paginate($query));
        $this->set('_serialize', ['therapists']);
    }

    /**
     * View method
     *
     * @param string|null $id Therapist id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $therapist = $this->Therapists->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('therapist', $therapist);
        $this->set('_serialize', ['therapist']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();
        $therapist = $this->Therapists->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {
            $therapist = $this->Therapists->patchEntity($therapist, $this->request->data);
            if ($this->Therapists->save($therapist)) {
                $this->Flash->success(__('The therapist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The therapist could not be saved. Please, try again.'));
            }
        }
        $users = $this->Therapists->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('therapist', 'users'));
        $this->set('_serialize', ['therapist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Therapist id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $therapist = $this->Therapists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $therapist = $this->Therapists->patchEntity($therapist, $this->request->data);
            if ($this->Therapists->save($therapist)) {
                $this->Flash->success(__('The therapist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The therapist could not be saved. Please, try again.'));
            }
        }
        $users = $this->Therapists->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('therapist', 'users'));
        $this->set('_serialize', ['therapist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Therapist id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $therapist = $this->Therapists->get($id);
        if ($this->Therapists->delete($therapist)) {
            $this->Flash->success(__('The therapist has been deleted.'));
        } else {
            $this->Flash->error(__('The therapist could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
