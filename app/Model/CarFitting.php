<?php
App::uses('AppModel', 'Model');
/**
 * CarFitting Model
 *
 * @property Car $Car
 */
class CarFitting extends AppModel {


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
}
