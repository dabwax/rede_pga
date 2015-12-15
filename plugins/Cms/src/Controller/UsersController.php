<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Users Controller
 *
 * @property \Cms\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Instituitions']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['profile_attachment'] = $this->Upload->uploadIt("profile_attachment", $user);

            $user = $this->Users->patchEntity($user, $this->request->data);

            // start - get instituition name input and converts to ID
            $tmp = $this->Users->Instituitions->find()->where(['name LIKE' => '%' . $this->request->data['instituition_id'] . '%' ])->first();

            if($tmp)
            {
                $user->instituition_id = $tmp->id;
            } else {
                $entity = $this->Users->Instituitions->newEntity(['name' => $this->request->data['instituition_id']]);
                $this->Users->Instituitions->save($entity);

                $user->instituition_id = $entity->id;
            }
            // end - get instituition name

            if ($this->Users->save($user)) {

                $this->Cookie->write('current_user_selected', $user);

                $this->Flash->success(__('O estudante foi cadastrado. Agora você irá configurar os atores.'));
                return $this->redirect(['controller' => 'dashboard', 'action' => 'config_actors']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $instituitions = $this->Users->Instituitions->find('list', ['limit' => 200]);
        $this->set(compact('user', 'instituitions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Instituitions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['profile_attachment'] = $this->Upload->uploadIt("profile_attachment", $user);

            $user = $this->Users->patchEntity($user, $this->request->data);

            // start - get instituition name input and converts to ID
            $tmp = $this->Users->Instituitions->find()->where(['name LIKE' => '%' . $this->request->data['instituition_id'] . '%' ])->first();

            if($tmp)
            {
                $user->instituition_id = $tmp->id;
            } else {
                $entity = $this->Users->Instituitions->newEntity(['name' => $this->request->data['instituition_id']]);
                $this->Users->Instituitions->save($entity);

                $user->instituition_id = $entity->id;
            }
            // end - get instituition name

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $instituitions = $this->Users->Instituitions->find('list', ['limit' => 200]);

        $user->instituition_id = $user->instituition->name;

        $this->set(compact('user', 'instituitions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
