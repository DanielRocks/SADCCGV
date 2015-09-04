<!-- File: /app/Controller/escolhas_controller.php -->
<?php
class EscolhasController extends AppController {
	var $name = 'Escolhas';

    // Display user data (R)
	function index()
    {
		$this--->set('escolhas', $this->Escolha->find('all'));
	}
}
?>