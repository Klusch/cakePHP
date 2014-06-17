<?php
App::uses('AppModel', 'Model');
/**
 * Utility Model
 *
 * @property Shop $Shop
 * @property Troubleshooting $Troubleshooting
 */
class Utility extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'shop_id',
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
}
