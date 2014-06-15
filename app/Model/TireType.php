<?php
App::uses('AppModel', 'Model');
/**
 * TireType Model
 *
 * @property Tire $Tire
 */
class TireType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tire' => array(
			'className' => 'Tire',
			'joinTable' => 'tires_tire_types',
			'foreignKey' => 'tire_type_id',
			'associationForeignKey' => 'tire_id',
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
