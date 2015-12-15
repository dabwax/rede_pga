<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class IradoComponent extends Component
{
  public $components = ['Cookie', 'Flash'];

  public function initialize(array $config)
  {
    $controller = $this->_registry->getController();
    $controller_has_protected_area = $controller->protected_area;

    if($controller_has_protected_area)
    {
      $cookie_user = $this->Cookie->read('admin_logged');

      if(empty($cookie_user))
      {
        $this->Flash->error('Você não tem permissão para acessar esta página123.');

        return $controller->redirect(['controller' => 'Authentication', 'action' => 'login']);
      }
    }
  }
}
