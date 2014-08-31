<?php
App::uses('AppModel', 'Model');
/**
 * Car Model
 *
 * @property CarFitting $CarFitting
 * @property Tire $Tire
 * @property Problem $Problem
 */
class Car extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CarFitting' => array(
			'className' => 'CarFitting',
			'foreignKey' => 'car_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Tire' => array(
			'className' => 'Tire',
			'foreignKey' => 'car_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Problem' => array(
			'className' => 'Problem',
			'joinTable' => 'cars_problems',
			'foreignKey' => 'car_id',
			'associationForeignKey' => 'problem_id',
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
