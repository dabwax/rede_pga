<?php

namespace Cms\Controller;

use App\Controller\AppController as BaseController;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;

/**
 * AppController do CMS.
 */
class AppController extends BaseController
{

    public function initialize()
    {
      // Herança
      parent::initialize();

      // Verifica se o usuário que está tentando visualizar o CMS
      // é um usuário administrador
      if(!$this->verificarAdministrador()) {
          $this->Flash->error("Você não é um administrador para acessar o CMS. Você foi expulso!");
          return $this->redirect($this->Auth->logout());
      }

      // Vamos puxar sempre as informações do estudante atual
      $this->estudanteAtual();
    }

/**
 * Função usada para verificar se o usuário tem permissão
 * para ver o CMS.
 */
    public function verificarAdministrador()
    {

      if(get_class($this) == "Cms\Controller\ApiController") {
        return true;
      }

        return (bool) $this->Auth->user('is_admin');
    }

/**
 * Função utilizada para puxar as informações do estudante atual.
 */
    public function estudanteAtual()
    {
      // Le o cookie de estudanteAtual
      // Se não houver nenhum estudante preenchido
      if(empty( $this->Cookie->read("estudanteAtual") )) {
        // Busca o primeiro estudante do banco de dados
        $estudantes = TableRegistry::get("Users");

        $this->Cookie->write('estudanteAtual', $estudantes->find()->first() );
      }

      // Tmp
      $estudanteAtual = $this->Cookie->read("estudanteAtual");

      // Envia para todas as views do CMS
      $this->set(compact("estudanteAtual"));

      // Retorna os dados do estudante atual
      return $estudanteAtual;
    }
}
