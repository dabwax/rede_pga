<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class AuthenticationController extends AppController
{
	public $protected_area = false;

	public function login()
	{

		if($this->request->is("post"))
		{
		  $form = $this->request->data;

		  // Carrega o model selecionado
		  $role_model = TableRegistry::get("Admins");

		  // Busca no model usuários deste role
		  $find = $role_model->find()->where(['username' => $form['username']])->all();

		  // Itera os usuários para ver se existe algum com este usuário
		  $username = $form['username'];
		  $password = $form['password'];

		  $user_found = false;

		  foreach($find as $f)
		  {
		    if($f->username == $username && $f->password == $password)
		    {
		      $user_found = $f;
		    }
		  }

		  if($user_found)
		  {
		    $this->Cookie->write('cms_logged', $user_found);
		    $this->Flash->success("Seja bem-vindo!");
		    return $this->redirect('/cms');
		  } else {
		    $this->Flash->error("Usuário e/ou senha inválidos.");
		    return $this->redirect('/cms/authentication/login');
		  }

		}
	}

	public function logout()
	{
		$this->Cookie->delete("cms_logged");
		$this->Flash->success("Nos vemos em breve! :)");
		return $this->redirect('/cms/authentication/login');
	}

}