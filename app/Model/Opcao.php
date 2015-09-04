<?php
App::uses('AppModel', 'Model');
/**
 * Opcao Model
 *
 */
class Opcao extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'opcao';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDopcao';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDopcao';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDopcao' => array(
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
