<?php
App::uses('AppModel', 'Model');
/**
 * Program Model
 *
 * @property WashingMachine $WashingMachine
 */
class Program extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $order = 'Program.name ASC';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'WashingMachine' => array(
			'className' => 'WashingMachine',
			'foreignKey' => 'program_id',
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
