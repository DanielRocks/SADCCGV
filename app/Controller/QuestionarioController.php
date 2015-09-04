<!-- File: /app/Controller/QuestionarioController.php -->
<?php
class QuestionarioController extends AppController {
	public $helpers = array ('Html','Form');
    public $name = 'Questionarios';

    // Display user data (R)
	function index()
    {
		$this->set('questionarios', $this->Questionario->find('all'));
	}
}
?>