<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component\AuthComponent;

/**
 * Controller principal do PEP.
 */
class AppController extends Controller
{
  public $userLogged = false;

/**
 * Construtor.
 */
    public function initialize()
    {
      // Inicializa componentes do CakePHP
      parent::initialize();
      $this->loadComponent('Flash');
      $this->loadComponent('Upload');
      $this->loadComponent('Cookie');

      // Inicializa camada de Autenticação
      $this->loadComponent('Auth', [
        'loginAction' => [
            'controller' => 'Authentication',
            'action' => 'login',
            'plugin' => false
        ],
        'authError' => 'Você precisa de autorização para visualizar esta página.',
        'authenticate' => [
            'Form' => [
              'finder' => 'auth'
            ]
        ],
        'storage' => 'Session',
        'flash' => [
          'element' => 'error'
        ]
      ]);

      $this->userLogged = $this->getUserLogged();
      

      // Envia as credenciais do usuário logado
      $this->set('userLogged', $this->userLogged );

      //$this->Auth->allow();

      // Recupera todas as permissões
      $permissions = $this->getPermissions();

      // Roda o método de configuração de ACL
      $this->configAcl($permissions);

      // Recupera os atores do usuário logado
      $get_atores = $this->getAtores();

      $this->set(compact("admin_logged", "get_atores", "permissions"));
    }

/**
 * Função utilizada para definir permissões de página.
 * Elas são configuradas através do administrador.
 */
    public function getPermissions()
    {

      // Permissões - ACL
      $permissions = [
        'Protectors' => false,
        'Schools' => false,
        'Therapists' => false,
        'Users' => false,
      ];

      $table = TableRegistry::get("Permissions");

      // busca todas as permissões do BD
      $all = $table->find()->all();

      // armazena elas
      foreach($all as $a)
      {
        $permissions[$a->model] = $a;
      }

      // retorna
      return $permissions;
    }

/**
 * Método utilizado para configurar ACL do site.
 * Roda baseado nas permissões de páginas configuradas no CMS.
 */
    public function configAcl($permissions)
    {

      // se for front-end e existir usuário logado
      if($this->isFrontEnd() && !empty($this->userLogged)) {

        // vamos verificar o controller sendo acessado
        $table = ucfirst($this->userLogged['table']);
        $property = strtolower($this->request->params['controller']);

        // se a página acessada para o model logado estiver com value 0
        // desloga o usuário e manda ele para tela de login
        if($permissions[ $table ]->$property == 0) {
          return $this->redirect($this->Auth->logout());
        }

      } // isFrontEnd()

    }

/**
 * Verifica se é o front-end (ou seja, não é o CMS).
 * Helper method.
 */
    public function isFrontEnd() {
      return $this->request->params['plugin'] != "Cms";
    }

/**
 * Função para recuperar todos os atores do usuário logado.
 */
    public function getAtores()
    {   
      $protectors_table = TableRegistry::get("Protectors");
      $schools_table = TableRegistry::get("Schools");
      $tutors_table = TableRegistry::get("Tutors");
      $users_table = TableRegistry::get("Users");
      $therapists_table = TableRegistry::get("Therapists");

      $admin_logged = $this->Cookie->read("admin_logged");
      $current_user_selected = $this->Cookie->read("current_user_selected");

      if(empty($admin_logged['user_id']) && !empty($admin_logged['id']))
      {
        $admin_logged['user_id'] = $admin_logged['id'];

        $this->Cookie->write("admin_logged", $admin_logged);
      }

      if(!empty($current_user_selected))
      {
        $admin_logged['user_id'] = $current_user_selected['id'];
      }

      $where = [
        'user_id' => $admin_logged['user_id']
      ];

      $atores = [
        'Protectors' => $protectors_table->find()->where($where)->all()->toArray(),
        'Schools' => $schools_table->find()->where($where)->all()->toArray(),
        'Tutors' => $tutors_table->find()->where($where)->all()->toArray(),
        'Users' => $users_table->find()->where(['id' => $admin_logged['user_id']])->all()->toArray(),
        'Therapists' => $therapists_table->find()->where($where)->all()->toArray(),
      ];

      return $atores;
    }

    public function getUserLogged()
    {
      return $this->Auth->user();
    }

    public function getAdminLogged()
    {
      return $this->getUserLogged();
      /*
      $admin_logged = $this->Cookie->read("admin_logged");

      if(empty($admin_logged['user_id']))
      {
        $admin_logged['user_id'] = $admin_logged['id'];
      }

      $users_table = TableRegistry::get("Users");

      if(!empty($admin_logged['user_id']))
      {
        $admin_logged['user'] = $users_table->get($admin_logged['user_id']);
      }*/
      
      return $admin_logged;
    }

    public function currentUserIsStudent()
    {
      $current_user = $this->getAdminlogged();
      
      return ($current_user['role_role'] == "user");
    }

    public function currentUser($key)
    {
      $current_user = $this->getAdminlogged();
      
      return $current_user[$key];
    }

}
