<?php
namespace Estudante\Controller;

use Estudante\Controller\AppController;

class ExerciciosController extends AppController
{

	public function index()
    {
    	
		// Sessão de admin
    	$admin_logged = $this->Cookie->read("admin_logged");

    	$atores = $this->getAtores();

    	$this->set(compact("admin_logged", "atores"));

    }

}
