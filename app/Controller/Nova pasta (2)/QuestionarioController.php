<!-- File: /app/Controller/QuestionarioController.php -->
<?php
class QuestionarioController extends AppController {
	var $name = 'Questionarios';

    // Display user data (R)
	function index()
    {
		$this->set('questionarios', $this->Questionario->find('all'));
	}
}
?>