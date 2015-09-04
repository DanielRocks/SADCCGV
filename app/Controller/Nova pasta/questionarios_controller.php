<!-- File: /app/Controller/questionarios_controller.php -->
<?php
class QuestionariosController extends AppController {
	var $name = 'Questionarios';

    // Display user data (R)
	function index()
    {
		$this--->set('questionarios', $this->Questionario->find('all'));
	}
}
?>