<?php
App::uses('Perguntum', 'Model');

/**
 * Perguntum Test Case
 *
 */
class PerguntumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.perguntum'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Perguntum = ClassRegistry::init('Perguntum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Perguntum);

		parent::tearDown();
	}

}
