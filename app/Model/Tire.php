<?php
App::uses('AppModel', 'Model');
/**
 * Tire Model
 *
 * @property Car $Car
 * @property TireType $TireType
 */
class Tire extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Car' => array(
			'className' => 'Car',
			'foreignKey' => 'car_id',
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
		'TireType' => array(
			'className' => 'TireType',
			'joinTable' => 'tires_tire_types',
			'foreignKey' => 'tire_id',
			'associationForeignKey' => 'tire_type_id',
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
