<!-- File: /app/Controller/gerentes_controller.php -->
<?php
class GerentesController extends AppController {
	var $name = 'Gerentes';

    // Display user data (R)
	function index()
    {
		$this--->set('gerentes', $this->Gerente->find('all'));
	}
}
?>