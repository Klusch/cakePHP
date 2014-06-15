<?php
App::uses('AppModel', 'Model');
/**
 * Problem Model
 *
 * @property ProblemLocation $ProblemLocation
 * @property Priority $Priority
 * @property Troubleshooting $Troubleshooting
 * @property Car $Car
 */
class Problem extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ProblemLocation' => array(
			'className' => 'ProblemLocation',
			'foreignKey' => 'problem_location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Priority' => array(
			'className' => 'Priority',
			'foreignKey' => 'priority_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Troubleshooting' => array(
			'className' => 'Troubleshooting',
			'foreignKey' => 'troubleshooting_id',
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
		'Car' => array(
			'className' => 'Car',
			'joinTable' => 'cars_problems',
			'foreignKey' => 'problem_id',
			'associationForeignKey' => 'car_id',
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
