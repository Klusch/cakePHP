<?php
App::uses('AppModel', 'Model');
/**
 * BankType Model
 *
 * @property Bank $Bank
 */
class BankType extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'bank_type';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Bank' => array(
			'className' => 'Bank',
			'foreignKey' => 'bank_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
