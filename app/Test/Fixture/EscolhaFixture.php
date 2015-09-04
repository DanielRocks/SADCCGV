<?php
/**
 * EscolhaFixture
 *
 */
class EscolhaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'escolha';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IDescolha' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'IDfuncionario' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'IDopcao' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'IDescolha', 'unique' => 1)
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
			'IDescolha' => 1,
			'IDfuncionario' => 1,
			'IDopcao' => 1
		),
	);

}
