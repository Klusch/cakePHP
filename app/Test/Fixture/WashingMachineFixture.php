<?php
/**
 * WashingMachineFixture
 *
 */
class WashingMachineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'temperature_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'spin_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'power_consumtion' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '7,3'),
		'unit_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'duration' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_washing_machine__temperature' => array('column' => 'temperature_id', 'unique' => 0),
			'fk_washing_machine__spin' => array('column' => 'spin_id', 'unique' => 0),
			'fk_washing_machine__unit' => array('column' => 'unit_id', 'unique' => 0),
			'fk_washing_machine__program' => array('column' => 'program_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'program_id' => 1,
			'temperature_id' => 1,
			'spin_id' => 1,
			'power_consumtion' => 1,
			'unit_id' => 1,
			'duration' => 1,
			'created' => '2013-11-30 15:38:48',
			'modified' => '2013-11-30 15:38:48'
		),
	);

}
