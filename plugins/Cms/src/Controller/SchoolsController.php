<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Schools Controller
 *
 * @property \Cms\Model\Table\SchoolsTable $Schools
 */
class SchoolsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();

        $query = $this->Schools->find()->contain(['Users', 'Instituitions'])->where(
        [
            'Schools.user_id' => $current_user_selected['id']
        ]);

        $this->set('schools', $this->paginate($query));
        $this->set('_serialize', ['schools']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();
        $school = $this->Schools->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {
            $school = $this->Schools->patchEntity($school, $this->request->data);
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The school could not be saved. Please, try again.'));
            }
        }
        $users = $this->Schools->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $instituitions = $this->Schools->Instituitions->find('list', ['limit' => 200]);
        $this->set(compact('school', 'users', 'instituitions'));
        $this->set('_serialize', ['school']);
    }

    /**
     * Edit method
     *
     * @param string|null $id School id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $school = $this->Schools->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $school = $this->Schools->patchEntity($school, $this->request->data);
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The school could not be saved. Please, try again.'));
            }
        }
        $users = $this->Schools->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $instituitions = $this->Schools->Instituitions->find('list', ['limit' => 200]);
        $this->set(compact('school', 'users', 'instituitions'));
        $this->set('_serialize', ['school']);
    }

    /**
     * Delete method
     *
     * @param string|null $id School id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $school = $this->Schools->get($id);
        if ($this->Schools->delete($school)) {
            $this->Flash->success(__('The school has been deleted.'));
        } else {
            $this->Flash->error(__('The school could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
