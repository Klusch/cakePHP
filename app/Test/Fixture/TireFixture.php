<?php
/**
 * TireFixture
 *
 */
class TireFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'car_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'brand' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'produced_at' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'profile1' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '2,1'),
		'profile2' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '2,1'),
		'profile3' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '2,1'),
		'profile4' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '2,1'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'car_id' => 1,
			'brand' => 'Lorem ipsum dolor sit amet',
			'produced_at' => '2014-06-15 21:06:02',
			'profile1' => 1,
			'profile2' => 1,
			'profile3' => 1,
			'profile4' => 1,
			'modified' => '2014-06-15 21:06:02',
			'created' => '2014-06-15 21:06:02'
		),
	);

}
