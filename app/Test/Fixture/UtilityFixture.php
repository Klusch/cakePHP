<?php
/**
 * UtilityFixture
 *
 */
class UtilityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shop_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'price' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2'),
		'ordered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'delivered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'troubleshooting_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 1),
			'shop_id' => array('column' => 'shop_id', 'unique' => 0),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'shop_id' => 1,
			'price' => 1,
			'ordered' => '2014-06-17 22:50:05',
			'delivered' => '2014-06-17 22:50:05',
			'modified' => '2014-06-17 22:50:05',
			'created' => '2014-06-17 22:50:05',
			'troubleshooting_id' => 1
		),
	);

}
