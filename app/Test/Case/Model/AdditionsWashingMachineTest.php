<?php
App::uses('AdditionsWashingMachine', 'Model');

/**
 * AdditionsWashingMachine Test Case
 *
 */
class AdditionsWashingMachineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.additions_washing_machine',
		'app.addition',
		'app.washing_machine',
		'app.program'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AdditionsWashingMachine = ClassRegistry::init('AdditionsWashingMachine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdditionsWashingMachine);

		parent::tearDown();
	}

}
