<?php
/**
 * BankFixture
 *
 */
class BankFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'bank';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'iban' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 22, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bic' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'bank_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'rate_of_interest' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '3,3'),
		'rate_available' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'exemption_order_for_capital_gains' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'exemption_order_available' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'exemption_order_used' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2'),
		'exemption_order_proof' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'bank_balance' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '6,2'),
		'bank_balance_proof' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'product' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_bank_bank_type' => array('column' => 'bank_type_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'iban' => 'Lorem ipsum dolor si',
			'bic' => 'Lorem ips',
			'created' => '2014-01-18 22:04:04',
			'modified' => '2014-01-18 22:04:04',
			'bank_type_id' => 1,
			'rate_of_interest' => 1,
			'rate_available' => '2014-01-18 22:04:04',
			'exemption_order_for_capital_gains' => 1,
			'exemption_order_available' => '2014-01-18 22:04:04',
			'exemption_order_used' => 1,
			'exemption_order_proof' => '2014-01-18 22:04:04',
			'bank_balance' => 1,
			'bank_balance_proof' => '2014-01-18 22:04:04',
			'product' => 'Lorem ipsum dolor sit amet'
		),
	);

}
