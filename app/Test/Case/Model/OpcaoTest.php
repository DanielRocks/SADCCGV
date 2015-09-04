<?php
App::uses('Opcao', 'Model');

/**
 * Opcao Test Case
 *
 */
class OpcaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.opcao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Opcao = ClassRegistry::init('Opcao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Opcao);

		parent::tearDown();
	}

}
