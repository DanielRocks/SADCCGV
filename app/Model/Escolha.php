<?php
App::uses('AppModel', 'Model');
/**
 * Escolha Model
 *
 */
class Escolha extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'escolha';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDescolha';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDescolha';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDescolha' => array(
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
