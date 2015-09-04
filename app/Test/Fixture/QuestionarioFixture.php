<?php
/**
 * QuestionarioFixture
 *
 */
class QuestionarioFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'questionario';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IDquestionario' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'IDfuncionario' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'IDquestionario', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'IDquestionario' => 1,
			'IDfuncionario' => 1,
			'titulo' => 'Lorem ipsum dolor sit amet'
		),
	);

}
