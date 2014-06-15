<?php
App::uses('Problem', 'Model');

/**
 * Problem Test Case
 *
 */
class ProblemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.problem',
		'app.problem_location',
		'app.priority',
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
		$this->Problem = ClassRegistry::init('Problem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Problem);

		parent::tearDown();
	}

}
