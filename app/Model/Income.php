<?php
App::uses('AppModel', 'Model');
/**
 * Income Model
 *
 * @property Category $Category
 * @property SubCategory $SubCategory
 */
class Income extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'income';

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
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SubCategory' => array(
			'className' => 'SubCategory',
			'foreignKey' => 'sub_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
