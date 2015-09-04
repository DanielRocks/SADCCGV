<!-- File: /app/Controller/perguntas_controller.php -->
<?php
class PerguntasController extends AppController {
	var $name = 'Perguntas';

    // Display user data (R)
	function index()
    {
		$this--->set('perguntas', $this->Pergunta->find('all'));
	}
}
?>