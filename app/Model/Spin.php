<?php
App::uses('AppModel', 'Model');
/**
 * Spin Model
 *
 * @property Unit $Unit
 * @property WashingMachine $WashingMachine
 */
class Spin extends AppModel {

    public $displayField = 'value';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Unit' => array(
			'className' => 'Unit',
			'foreignKey' => 'unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'WashingMachine' => array(
			'className' => 'WashingMachine',
			'foreignKey' => 'spin_id',
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
