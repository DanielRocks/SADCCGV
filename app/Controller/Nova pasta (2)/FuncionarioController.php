<!-- File: /app/Controller/FuncionarioController.php -->
<?php
class FuncionarioController extends AppController {
	public $helpers = array ('Html','Form');
	public $name = 'Funcionarios';

    // Display user data (R)
	function index()
    {
		$this->set('funcionarios', $this->Funcionario->find('all'));
	}
}
?>