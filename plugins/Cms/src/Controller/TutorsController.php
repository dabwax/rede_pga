<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

class TutorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();
        
        $query = $this->Tutors->find()->contain(['Users'])->where(
        [
            'Tutors.user_id' => $current_user_selected['id']
        ]);
        $this->set('tutors', $this->paginate($query));
        $this->set('_serialize', ['tutors']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();
        $tutor = $this->Tutors->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {
            $tutor = $this->Tutors->patchEntity($tutor, $this->request->data);
            if ($this->Tutors->save($tutor)) {
                $this->Flash->success(__('The tutor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tutor could not be saved. Please, try again.'));
            }
        }
        $users = $this->Tutors->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('tutor', 'users'));
        $this->set('_serialize', ['tutor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id tutor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tutor = $this->Tutors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tutor = $this->Tutors->patchEntity($tutor, $this->request->data);
            if ($this->Tutors->save($tutor)) {
                $this->Flash->success(__('The tutor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tutor could not be saved. Please, try again.'));
            }
        }
        $users = $this->Tutors->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('tutor', 'users'));
        $this->set('_serialize', ['tutor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id tutor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tutor = $this->Tutors->get($id);
        if ($this->Tutors->delete($tutor)) {
            $this->Flash->success(__('The tutor has been deleted.'));
        } else {
            $this->Flash->error(__('The tutor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
