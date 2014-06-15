<?php
/**
 * TroubleshootingFixture
 *
 */
class TroubleshootingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'utility_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'utility_id' => array('column' => 'utility_id', 'unique' => 0)
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
			'utility_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2014-06-15 21:09:47',
			'created' => '2014-06-15 21:09:47'
		),
	);

}
