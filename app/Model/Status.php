<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 * @property Movie $Movie
 */
class Status extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'status';

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
		'Movie' => array(
			'className' => 'Movie',
			'foreignKey' => 'status_id',
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
