<!-- File: /app/Controller/funcionarios_controller.php -->
<?php
class FuncionariosController extends AppController {
	var $name = 'Funcionarios';

    // Display user data (R)
	function index()
    {
		$this--->set('funcionarios', $this->Funcionario->find('all'));
	}
}
?>