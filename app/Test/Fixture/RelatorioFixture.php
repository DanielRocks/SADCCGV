<?php
/**
 * RelatorioFixture
 *
 */
class RelatorioFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'relatorio';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IDrelatorio' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'IDfuncionario' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'avaliacao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'IDrelatorio', 'unique' => 1)
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
			'IDrelatorio' => 1,
			'IDfuncionario' => 1,
			'avaliacao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
