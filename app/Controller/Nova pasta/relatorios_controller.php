<!-- File: /app/Controller/relatorios_controller.php -->
<?php
class RelatorioController extends AppController {
	var $name = 'Relatorios';

    // Display user data (R)
	function index()
    {
		$this--->set('relatorios', $this->Relatorio->find('all'));
	}
}
?>