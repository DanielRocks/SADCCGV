<!-- File: /app/Controller/opcaos_controller.php -->
<?php
class OpcaoController extends AppController {
	var $name = 'Opcaos';

    // Display user data (R)
	function index()
    {
		$this--->set('opcaos', $this->Opcao->find('all'));
	}
}
?>