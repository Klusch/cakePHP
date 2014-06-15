<?php
App::uses('Priority', 'Model');

/**
 * Priority Test Case
 *
 */
class PriorityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.priority',
		'app.color',
		'app.problem',
		'app.problem_location',
		'app.troubleshooting',
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
		$this->Priority = ClassRegistry::init('Priority');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Priority);

		parent::tearDown();
	}

}
