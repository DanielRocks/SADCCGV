<?php
App::uses('AppModel', 'Model');
/**
 * Questionario Model
 *
 */
class Questionario extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'questionario';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDquestionario';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDquestionario';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDquestionario' => array(
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
