<?php
App::uses('AppModel', 'Model');
/**
 * Relatorio Model
 *
 */
class Relatorio extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'relatorio';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDrelatorio';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDrelatorio';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDrelatorio' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
