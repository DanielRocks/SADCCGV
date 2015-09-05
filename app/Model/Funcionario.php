<?php
App::uses('AppModel', 'Model');
/**
 * Funcionario Model
 *
 */
class Funcionario extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'funcionario';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDfuncionario';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDfuncionario';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDfuncionario' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'senha' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);
}
