<?php
App::uses('AppModel', 'Model');
/**
 * Bank Model
 *
 * @property BankType $BankType
 */
class Bank extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'bank';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BankType' => array(
			'className' => 'BankType',
			'foreignKey' => 'bank_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
