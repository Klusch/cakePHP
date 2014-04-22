<?php
App::uses('AppModel', 'Model');
/**
 * Movie Model
 *
 * @property Imdb $Imdb
 * @property MovieCategories $MovieCategories
 * @property Status $Status
 */
class Movie extends AppModel {

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
		'MovieCategories' => array(
			'className' => 'MovieCategories',
			'foreignKey' => 'movie_categories_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
