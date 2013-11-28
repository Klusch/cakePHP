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
			'created' => '2013-11-28 22:47:09',
			'modified' => '2013-11-28 22:47:09',
			'bank_type_id' => 1
		),
	);

}
