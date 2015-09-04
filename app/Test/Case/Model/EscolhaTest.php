<?php
App::uses('Escolha', 'Model');

/**
 * Escolha Test Case
 *
 */
class EscolhaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.escolha'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Escolha = ClassRegistry::init('Escolha');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Escolha);

		parent::tearDown();
	}

}
