<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class LoginForm extends Form
{

  protected function _execute(array $data)
  {
      // Send an email.
      return true;
  }

}
