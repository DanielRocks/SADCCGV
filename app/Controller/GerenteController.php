<!-- File: /app/Controller/GerenteController.php -->
<?php
class GerenteController extends AppController {
	public $helpers = array ('Html','Form');
    public $name = 'Gerentes';

    // Display user data (R)
	function index()
    {
		$this->set('gerentes', $this->Gerente->find('all'));
	}
}
?>