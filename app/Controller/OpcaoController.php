<!-- File: /app/Controller/OpcaoController.php -->
<?php
namespace App\Controller;

use App\Controller\AppController;

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