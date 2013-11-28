<?php
App::uses('BankType', 'Model');

/**
 * BankType Test Case
 *
 */
class BankTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bank_type',
		'app.bank'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BankType = ClassRegistry::init('BankType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BankType);

		parent::tearDown();
	}

}
