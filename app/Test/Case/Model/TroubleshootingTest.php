<?php
App::uses('Troubleshooting', 'Model');

/**
 * Troubleshooting Test Case
 *
 */
class TroubleshootingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.troubleshooting',
		'app.utility',
		'app.problem',
		'app.problem_location',
		'app.priority',
		'app.color',
		'app.car',
		'app.tire',
		'app.tire_type',
		'app.tires_tire_type',
		'app.cars_problem'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Troubleshooting = ClassRegistry::init('Troubleshooting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Troubleshooting);

		parent::tearDown();
	}

}
