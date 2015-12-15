<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Themes Controller
 *
 * @property \Cms\Model\Table\ThemesTable $Themes
 */
class ThemesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();

        $query = $this->Themes->find()->contain(['Users'])->where(
        [
            'Themes.user_id' => $current_user_selected['id']
        ]);
        $this->set('themes', $this->paginate($query));
        $this->set('_serialize', ['themes']);
    }

    /**
     * View method
     *
     * @param string|null $id Theme id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $theme = $this->Themes->get($id, [
            'contain' => ['Users', 'Charts', 'Exercises']
        ]);
        $this->set('theme', $theme);
        $this->set('_serialize', ['theme']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();

        $theme = $this->Themes->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {
            $theme = $this->Themes->patchEntity($theme, $this->request->data);
            if ($this->Themes->save($theme)) {
                $this->Flash->success(__('The theme has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The theme could not be saved. Please, try again.'));
            }
        }
        $users = $this->Themes->Users->find('list', ['limit' => 200]);
        $this->set(compact('theme', 'users'));
        $this->set('_serialize', ['theme']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Theme id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $theme = $this->Themes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $theme = $this->Themes->patchEntity($theme, $this->request->data);
            if ($this->Themes->save($theme)) {
                $this->Flash->success(__('The theme has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The theme could not be saved. Please, try again.'));
            }
        }
        $users = $this->Themes->Users->find('list', ['limit' => 200]);
        $this->set(compact('theme', 'users'));
        $this->set('_serialize', ['theme']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Theme id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $theme = $this->Themes->get($id);
        if ($this->Themes->delete($theme)) {
            $this->Flash->success(__('The theme has been deleted.'));
        } else {
            $this->Flash->error(__('The theme could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
