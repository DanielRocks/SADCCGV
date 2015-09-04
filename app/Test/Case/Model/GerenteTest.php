<?php
App::uses('Gerente', 'Model');

/**
 * Gerente Test Case
 *
 */
class GerenteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gerente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gerente = ClassRegistry::init('Gerente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gerente);

		parent::tearDown();
	}

}
