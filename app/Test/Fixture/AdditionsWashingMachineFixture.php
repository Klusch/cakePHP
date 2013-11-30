<?php
/**
 * AdditionsWashingMachineFixture
 *
 */
class AdditionsWashingMachineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'addition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'washing_machine_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'addition_id' => 1,
			'washing_machine_id' => 1
		),
	);

}
