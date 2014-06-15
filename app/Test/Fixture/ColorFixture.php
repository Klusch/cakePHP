<?php
/**
 * ColorFixture
 *
 */
class ColorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'red' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'green' => array('type' => 'integer', 'null' => true, 'default' => null),
		'blue' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 1),
			'red' => array('column' => array('red', 'green', 'blue'), 'unique' => 1)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'red' => 1,
			'green' => 1,
			'blue' => 1,
			'modified' => '2014-06-15 21:09:05',
			'created' => '2014-06-15 21:09:05'
		),
	);

}
