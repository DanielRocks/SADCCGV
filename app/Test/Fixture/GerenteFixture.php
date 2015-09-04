<?php
/**
 * GerenteFixture
 *
 */
class GerenteFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'gerente';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IDgerente' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'IDfuncionario' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'IDgerente', 'unique' => 1)
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
			'IDgerente' => 1,
			'IDfuncionario' => 1
		),
	);

}
