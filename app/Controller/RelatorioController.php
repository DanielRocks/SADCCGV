<!-- File: /app/Controller/RelatorioController.php -->
<?php
class RelatorioController extends AppController {
	public $helpers = array ('Html','Form');
    public $name = 'Relatorios';

    // Display user data (R)
	function index()
    {
		$this->set('relatorios', $this->Relatorio->find('all'));
	}
}
?>