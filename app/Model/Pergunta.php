<?php
App::uses('AppModel', 'Model');
/**
 * Pergunta Model
 *
 */
class Pergunta extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'IDpergunta';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'IDpergunta';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'IDpergunta' => array(
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
