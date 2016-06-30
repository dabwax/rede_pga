<?php
namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Controller\Component\AuthComponent;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Database\Type;
use Mailgun\Mailgun;

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

      // Envia as credenciais do usuário logado
      $this->userLogged = $this->Auth->user();

      if(!empty($this->userLogged['user_id'])) {
        $tmp = TableRegistry::get("Users");
        $this->userLogged['user'] = $tmp->get($this->userLogged['user_id']);

      }
        $this->set('userLogged', $this->userLogged );

      // Recupera todas as permissões
      $permissions = $this->getPermissions();

      // Roda o método de configuração de ACL
      $this->configAcl($permissions);

      if($this->request->params['controller'] == "Relatorio" || $this->request->params['controller'] == "Api") {
        $this->Auth->allow();
      }

      // Recupera os atores do usuário logado
      $get_atores = $this->getAtores();

      $this->set(compact("admin_logged", "get_atores", "permissions"));
    }

    public function dispararEmail($template_email_id = 0, $user = array(), $extra_data = array() ) {

      $mail = new \PHPMailer();

      $template_emails = TableRegistry::get("TemplateEmails");
      $template_email = $template_emails->get($template_email_id);
      $html = $template_email->content;
      $html = str_replace('{{user}}', $user->full_name, $html);
      $html = str_replace('{{password}}', @$extra_data['new_password'], $html);
      $html = str_replace('{{current_password}}', @$extra_data['current_password'], $html);

      foreach($extra_data as $key => $val) {
        $html = str_replace('{{' . $key . '}}', $val, $html);
      }

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'luizhrqas@gmail.com';                 // SMTP username
      $mail->Password = 'startrek123';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('no-reply@pep.com.br', 'PEP');
      $mail->addAddress($user->username);               // Name is optional

      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = '[PEP] ' . $template_email->title;
      $mail->Body    = $html;
      $mail->AltBody = $html;

      if($mail->send()) {
        return true;
      }
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
 * Função para recuperar todos os atores do usuário logado.
 */
    public function getAtores($where = null)
    {
      // Busca os models
      $models = [
        'Protectors'  => TableRegistry::get("Protectors"),
        'Schools'     => TableRegistry::get("Schools"),
        'Therapists'  => TableRegistry::get("Therapists"),
        'Users'       => TableRegistry::get("Users"),
        'Tutors'      => TableRegistry::get("Tutors"),
      ];

      // se a coluna "user_id" estiver vazia, porém a de ID estiver preenchida
      // significa que o usuário logado é um estudante
      // ou seja, fazemos um campo fake `user_id` utilizando a ID do usuário
      // para podermos puxar todos os estudantes corretamente
      if(empty($this->userLogged['user_id']) && !empty($this->userLogged['id']))
      {
        $this->userLogged['user_id'] = $this->userLogged['id'];
      }

      // WHERE da consulta
      if($where == null) {
        $where = [
          'user_id' => $this->userLogged['user_id']
        ];
      }

      // roda as consultas
      $atores = [
        'Protectors'  => $models['Protectors']->find()->where($where)->all()->toArray(),
        'Schools'     => $models['Schools']->find()->where($where)->all()->toArray(),
        'Tutors'      => $models['Tutors']->find()->where($where)->all()->toArray(),
        'Users'       => $models['Users']->find()->where(['id' => $this->userLogged['user_id'] ])->all()->toArray(),
        'Therapists'  => $models['Therapists']->find()->where($where)->all()->toArray(),
      ];

      return $atores;
    }

/**
 * (PRECISA DE REFATORAÇÃO)
 * Método utilizado pelo CMS para verificar se admin está logado.
 */
    public function getAdminLogged()
    {
      return $this->userLogged;
    }

/**
 * Verifica se o usuário logado é um estudante.
 * Helper method.
 */
    public function currentUserIsStudent()
    {
      return ($this->userLogged['role'] == "user");
    }

/**
 * Verifica se é o front-end (ou seja, não é o CMS).
 * Helper method.
 */
    public function isFrontEnd() {
      return $this->request->params['plugin'] != "Cms";
    }

/**
 * Recupera informação específica do usuário logado.
 * Helper method.
 */
    public function currentUser($key)
    {
      return $this->userLogged[$key];
    }

/**
 * Função utilizada para definir permissões de página.
 * Elas são configuradas através do administrador.
 * Helper method.
 */
    public function getPermissions()
    {

      // Permissões - ACL
      $permissions = [
        'Protectors' => false,
        'Schools' => false,
        'Tutors' => false,
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

}
