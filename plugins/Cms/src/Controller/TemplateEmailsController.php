<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * TemplateEmails Controller
 *
 * @property \Cms\Model\Table\TemplateEmailsTable $TemplateEmails */
class TemplateEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $templateEmails = $this->paginate($this->TemplateEmails);

        $this->set(compact('templateEmails'));
        $this->set('_serialize', ['templateEmails']);
    }

    /**
     * View method
     *
     * @param string|null $id Template Email id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $templateEmail = $this->TemplateEmails->get($id, [
            'contain' => []
        ]);

        $this->set('templateEmail', $templateEmail);
        $this->set('_serialize', ['templateEmail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $templateEmail = $this->TemplateEmails->newEntity();
        if ($this->request->is('post')) {
            $templateEmail = $this->TemplateEmails->patchEntity($templateEmail, $this->request->data);
            if ($this->TemplateEmails->save($templateEmail)) {
                $this->Flash->success(__('The template email has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template email could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('templateEmail'));
        $this->set('_serialize', ['templateEmail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Template Email id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $templateEmail = $this->TemplateEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $templateEmail = $this->TemplateEmails->patchEntity($templateEmail, $this->request->data);
            if ($this->TemplateEmails->save($templateEmail)) {
                $this->Flash->success(__('The template email has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template email could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('templateEmail'));
        $this->set('_serialize', ['templateEmail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Template Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $templateEmail = $this->TemplateEmails->get($id);
        if ($this->TemplateEmails->delete($templateEmail)) {
            $this->Flash->success(__('The template email has been deleted.'));
        } else {
            $this->Flash->error(__('The template email could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
