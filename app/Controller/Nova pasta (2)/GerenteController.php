<!-- File: /app/Controller/GerenteController.php -->
<?php
class GerenteController extends AppController {
	var $name = 'Gerentes';

    // Display user data (R)
	function index()
    {
		$this->set('gerentes', $this->Gerente->find('all'));
	}
}
?>