<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{

    public function configurar_atores()
    {

    // generate labels
    $labels = [
       'Protectors' => 'Pai / Mãe'
      ,'Schools' => 'Mediador / Coordenador'
      ,'Therapists' => 'Terapeuta'
      ,'Tutors' => 'Tutor'
    ];

    // get all actors from this student
    $actors = $this->getAtores();

    $instituitions = TableRegistry::get("instituitions");
    $instituitions = $instituitions->find('list')->all();

    // send to view
    $this->set(compact("labels", "actors", "instituitions"));

    // if POST request
    if($this->request->is(["post", "put"])) {

      // shortcut
      $data = $this->request->data;

      // Se não tiver sido preenchido nenhuma senha, remove o campo dela
      // para nao bugar e atualizar a senha para vazio
      if(strlen($data['password']) <= 0) {
        unset($data['password']);
      } else {
          $cache_password = $data['password'];
        	$data['password'] = (new DefaultPasswordHasher)->hash($data['password']);
      }

      // generates model object
      $table = TableRegistry::get($data['model']);

      // generates entity object
      $entity = $table->newEntity();

      // if has any ID, update it
      if(!empty($data['id']))
      {
        $entity = $table->get($data['id']);
      }

      $entity = $table->patchEntity($entity, $data);

      // Se não tiver sido passad nenhum ID
      // (ou seja, se o usuário estiver sendo adicionado ao invés de editado)
      if(empty($data['id'])) {

        // Disparo de e-mail usando o template de ator cadastrado
        $extra_data = [
          'current_password' => $cache_password
        ];
        if($this->dispararEmail(2, $entity, $extra_data )) {

        }
      }

      if(!empty($data['instituition_id']))
      {

        $table2 = TableRegistry::get("Instituitions");

        // start - get instituition name input and converts to ID
        $tmp = $table2->find()->where(['name LIKE' => '%' . $data['instituition_id'] . '%' ])->first();

        if($tmp)
        {
            $entity->instituition_id = $tmp->id;
        } else {
            $tmp = $table2->newEntity(['name' => $data['instituition_id'] ]);
            $table2->save($tmp);

            $entity->instituition_id = $tmp->id;
        }
        // end - get instituition name

      }

      // save entity
      $table->save($entity);

      // alert
      $this->Flash->success($labels[$data['model']] . ' foi atualizado!');

      // redirect
      return $this->redirect(['action' => 'configurar_atores', '#' => 'c_' . $data['model'] ]);
    } // end POST request

  }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['profile_attachment'] = $this->Upload->uploadIt("profile_attachment", $user);

            $user = $this->Users->patchEntity($user, $this->request->data);

            // Disparo de e-mail usando o template de ator cadastrado
            $extra_data = [
              'username' => $this->request->data['username'],
              'new_password' => $this->request->data['password']
            ];

            if($this->dispararEmail(6, $user, $extra_data )) {
                $this->Flash->success(__('Foi enviado um e-mail para o aluno cadastrado. No e-mail terá o seu usuário e senha.'));
            }

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

                $this->Cookie->write('estudanteAtual', $user);

                $this->Flash->success(__('O aluno foi cadastrado. Agora você irá configurar os atores.'));
                return $this->redirect(['action' => 'configurar_atores']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o aluno.'));
            }
        }
        $instituitions = $this->Users->Instituitions->find('list', ['limit' => 200]);
        $this->set(compact('user', 'instituitions'));
        $this->set('_serialize', ['user']);
    }

/**
 * Action utilizada para definir qual é o aluno atual.
 */
    public function trocar_aluno($id = null)
    {
        $estudanteAtual = $this->estudanteAtual();
        $users = TableRegistry::get("Users");

        if(!empty($id)) {

          $user = $users->get($id);

          $this->Cookie->write('estudanteAtual', $user );
          $this->Flash->success("O aluno foi alterado para {$user->full_name}.");

          return $this->redirect('/cms');
        } else {

          $users = $users->find()->all();

          $this->set(compact("users"));
        }
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Instituitions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {


          if($this->request->data['username'] != $user->username) {
            // Disparo de e-mail usando o template de ator cadastrado
            $extra_data = [
              'username' => $this->request->data['username'],
              'new_password' => $this->request->data['password']
            ];

            $user->username = $this->request->data['username'];

            if($this->dispararEmail(6, $user, $extra_data )) {
                $this->Flash->success(__('Foi enviado um e-mail para o novo e-mail cadastrado para o Aluno. No e-mail terá o seu usuário e senha.'));
            }
          }

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
                $this->Flash->success(__('As informações do estudante foram atualizadas.'));
                return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o estudante. Verifique os dados.'));
            }
        }
        $instituitions = $this->Users->Instituitions->find('list', ['limit' => 200]);

        $user->instituition_id = $user->instituition->name;

        $this->set(compact('user', 'instituitions'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O aluno foi removido.'));
        } else {
            $this->Flash->error(__('Não foi possível remover o aluno.'));
        }
        return $this->redirect('/cms');
    }

/**
 * Action utilizada para remover atores.
 * Primeiro parametro é o nome do model.
 * Segundo é o ID a ser removido.
 * Esta action é usada na página de configuração de ator.
 */
    public function delete_actor($model = null, $id = null)
    {
      $table = TableRegistry::get($model);

      $entry = $table->get($id);

        if ($table->delete($entry)) {
            $this->Flash->success(__('O ator foi removido.'));
        } else {
            $this->Flash->error(__('Não foi possível remover o ator.'));
        }
        return $this->redirect(['action' => 'configurar_atores']);
    }
}
