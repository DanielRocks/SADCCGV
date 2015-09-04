<!-- File: /app/Controller/OpcaoController.php -->
<?php
class OpcaoController extends AppController {
	public $helpers = array ('Html','Form');
    public $name = 'Opcaos';

    // Display user data (R)
	function index()
    {
		$this->set('opcaos', $this->Opcao->find('all'));
	}
}
?>