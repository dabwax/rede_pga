<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Exercises Controller
 *
 * @property \Cms\Model\Table\ExercisesTable $Exercises
 */
class ExercisesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();

        $query = $this->Exercises->find()->contain(['Users', 'Lessons', 'Themes'])->where(
        [
            'Exercises.user_id' => $current_user_selected['id']
        ]);

        $this->set('exercises', $this->paginate($query));
        $this->set('_serialize', ['exercises']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();
        $exercise = $this->Exercises->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {

            $this->request->data['attachment'] = $this->Upload->uploadIt("attachment", null);
            
            $exercise = $this->Exercises->patchEntity($exercise, $this->request->data);
            if ($this->Exercises->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
            }
        }
        $users = $this->Exercises->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $lessons = $this->Exercises->Lessons->find('list', ['valueField' => 'date', 'limit' => 200]);
        $themes = $this->Exercises->Themes->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'users', 'lessons', 'themes'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercise = $this->Exercises->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['attachment'] = $this->Upload->uploadIt("attachment", $exercise);

            $exercise = $this->Exercises->patchEntity($exercise, $this->request->data);
            if ($this->Exercises->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
            }
        }
        $users = $this->Exercises->Users->find('list', ['limit' => 200]);
        $lessons = $this->Exercises->Lessons->find('list', ['limit' => 200]);
        $themes = $this->Exercises->Themes->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'users', 'lessons', 'themes'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercises->get($id);
        if ($this->Exercises->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
