<?php
App::uses('WashingMachine', 'Model');

/**
 * WashingMachine Test Case
 *
 */
class WashingMachineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.washing_machine',
		'app.program',
		'app.addition',
		'app.additions_washing_machine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WashingMachine = ClassRegistry::init('WashingMachine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WashingMachine);

		parent::tearDown();
	}

}
