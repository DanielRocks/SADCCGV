<?php
/**
 * FuncionarioFixture
 *
 */
class FuncionarioFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'funcionario';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IDfuncionario' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'login' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'senha' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'responsavel' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'departamento' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'IDfuncionario', 'unique' => 1)
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
			'IDfuncionario' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'login' => 'Lorem ipsum dolor ',
			'senha' => 'Lorem ipsum dolor ',
			'responsavel' => 1,
			'departamento' => 'Lorem ipsum dolor sit a'
		),
	);

}
