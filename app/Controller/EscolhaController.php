<!-- File: /app/Controller/EscolhaController.php -->
<?php
namespace App\Controller;

use App\Controller\AppController;

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