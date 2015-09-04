<?php
App::uses('AppModel', 'Model');
/**
 * Gerente Model
 *
 */
class Gerente extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'gerente';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDgerente';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDgerente';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDgerente' => array(
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
