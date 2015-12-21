<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Inputs Controller
 *
 * @property \Cms\Model\Table\InputsTable $Inputs
 */
class InputsController extends AppController
{

    public function sortable()
    {
        $this->autoRender = false;

        foreach($_GET['item_id'] as $position => $item_id)
        {
            $entity = $this->Inputs->get($item_id);

            $entity->position = $position;

            $this->Inputs->save($entity);
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $current_user_selected = $this->getCurrentUser();
      
        $query = $this->Inputs->find()->contain(['Users'])->where(
        [
            'Inputs.user_id' => $current_user_selected['id'],
            'Inputs.status' => 1
        ])->order(['Inputs.position' => 'DESC']);

        $this->set('inputs', $this->paginate($query));
        $this->set('_serialize', ['inputs']);
    }

    /**
     * View method
     *
     * @param string|null $id Input id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $input = $this->Inputs->get($id, [
            'contain' => ['Users', 'LessonEntries']
        ]);
        $this->set('input', $input);
        $this->set('_serialize', ['input']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $current_user_selected = $this->getCurrentUser();
        $input = $this->Inputs->newEntity(['user_id' => $current_user_selected['id']]);
        if ($this->request->is('post')) {


            if($this->request->data['type'] == 'escala_numerica')
            {
                $tmp = [
                    'min' => @$this->request->data['config']['min'],
                    'max' => @$this->request->data['config']['max']
                ];

                $this->request->data['config'] = json_encode($tmp);
            }

            if($this->request->data['type'] == 'escala_texto')
            {
                $tmp = [
                    'options' => $this->request->data['config']['options']
                ];

                $this->request->data['config'] = json_encode($tmp);
            }

            $input = $this->Inputs->patchEntity($input, $this->request->data);
            if ($this->Inputs->save($input)) {
                $this->Flash->success(__('The input has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The input could not be saved. Please, try again.'));
            }
        }
        $users = $this->Inputs->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);
        $this->set(compact('input', 'users'));
        $this->set('_serialize', ['input']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Input id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $input = $this->Inputs->get($id, [
            'contain' => []
        ]);

        $input->config = json_decode($input->config, true);

        if ($this->request->is(['patch', 'post', 'put'])) {

            if($this->request->data['type'] == 'escala_numerica')
            {
                $tmp = [
                    'min' => @$this->request->data['config']['min'],
                    'max' => @$this->request->data['config']['max']
                ];

                $this->request->data['config'] = json_encode($tmp);
            }

            if($this->request->data['type'] == 'escala_texto')
            {
                $tmp = [
                    'options' => $this->request->data['config']['options']
                ];

                $this->request->data['config'] = json_encode($tmp);
            }

            $input = $this->Inputs->patchEntity($input, $this->request->data);
            if ($this->Inputs->save($input)) {
                $this->Flash->success(__('The input has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The input could not be saved. Please, try again.'));
            }
        }
        $users = $this->Inputs->Users->find('list', ['valueField' => 'full_name', 'limit' => 200]);

        $this->set(compact('input', 'users'));
        $this->set('_serialize', ['input']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Input id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $input = $this->Inputs->get($id);

        $input->status = 0;

        if ($this->Inputs->save($input)) {
            $this->Flash->success(__('O input foi ocultado.'));
        } else {
            $this->Flash->error(__('The input could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
