<!-- File: /app/Controller/PerguntaController.php -->
<?php
class PerguntaController extends AppController {
	var $name = 'Perguntas';

    // Display user data (R)
	function index()
    {
		$this->set('perguntas', $this->Pergunta->find('all'));
	}
}
?>