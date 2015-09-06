<?php

class AppController extends Controller
{
	public $components = array(
		'Auth' => array(
			'autorize' => 'controller',
			'loginRedirect' => array(
				'admin' => false,
				'controller' => 'funcionarios',
				'action' => 'index',
				'loginError' => 'Conta invalida',
				'authError' => 'Voce nao tem permissao para isto'
			)
		'Session'
		);
	
	public function beforeFilter()
	{
		if ($this->Auth->getModel()->hasField('active')){
			$this->Auth->userScope = array('active' => 1)
		}
	}
	
	public function isAuthotized()
	{
		return true;
	}
}


?>