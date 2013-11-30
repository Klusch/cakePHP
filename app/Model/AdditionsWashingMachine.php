<?php
App::uses('AppModel', 'Model');
/**
 * AdditionsWashingMachine Model
 *
 * @property Addition $Addition
 * @property WashingMachine $WashingMachine
 */
class AdditionsWashingMachine extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Addition' => array(
			'className' => 'Addition',
			'foreignKey' => 'addition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'WashingMachine' => array(
			'className' => 'WashingMachine',
			'foreignKey' => 'washing_machine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
