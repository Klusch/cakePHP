<?php
/**
 * ProblemFixture
 *
 */
class ProblemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'problem_location_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'priority_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'troubleshooting_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'solved' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'problem_location_id' => array('column' => 'problem_location_id', 'unique' => 0),
			'priority_id' => array('column' => 'priority_id', 'unique' => 0),
			'troubleshooting_id' => array('column' => 'troubleshooting_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'problem_location_id' => 1,
			'priority_id' => 1,
			'troubleshooting_id' => 1,
			'solved' => 1
		),
	);

}
