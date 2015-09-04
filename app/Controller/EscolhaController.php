<!-- File: /app/Controller/EscolhaController.php -->
<?php
class EscolhaController extends AppController {
	public $helpers = array ('Html','Form');
    public $name = 'Escolhas';

    // Display user data (R)
	function index()
    {
		$this->set('escolhas', $this->Escolha->find('all'));
	}
}
?>