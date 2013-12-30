<?php
App::uses('AppModel', 'Model');
/**
 * Addition Model
 *
 * @property WashingMachine $WashingMachine
 */
class Addition extends AppModel {

    public $useTable = 'additions';
    public $displayField = 'addition';
    public $order = 'Addition.addition ASC';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'WashingMachine' => array(
			'className' => 'WashingMachine',
			'joinTable' => 'additions_washing_machines',
			'foreignKey' => 'addition_id',
			'associationForeignKey' => 'washing_machine_id',
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
