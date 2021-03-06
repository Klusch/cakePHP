<?php
App::uses('AppModel', 'Model');
/**
 * Temperature Model
 *
 * @property Unit $Unit
 * @property WashingMachine $WashingMachine
 */
class Temperature extends AppModel {

    public $displayField = 'value';
    public $order = 'Temperature.value ASC';
	
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
			'foreignKey' => 'temperature_id',
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
