<?php
App::uses('AppModel', 'Model');
/**
 * WashingMachine Model
 *
 * @property Program $Program
 * @property Temperature $Temperature
 * @property Spin $Spin
 * @property Unit $Unit
 * @property Addition $Addition
 */
class WashingMachine extends AppModel {

	public $displayField = 'program_id';
    public $order = array("Program.name" => "asc",
                          "Temperature.value" => "asc",
                          "WashingMachine.power_consumtion" => "asc"
    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Temperature' => array(
			'className' => 'Temperature',
			'foreignKey' => 'temperature_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Spin' => array(
			'className' => 'Spin',
			'foreignKey' => 'spin_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Unit' => array(
			'className' => 'Unit',
			'foreignKey' => 'unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Addition' => array(
			'className' => 'Addition',
			'joinTable' => 'additions_washing_machines',
			'foreignKey' => 'washing_machine_id',
			'associationForeignKey' => 'addition_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
