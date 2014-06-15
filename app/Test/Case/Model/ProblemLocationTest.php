<?php
App::uses('ProblemLocation', 'Model');

/**
 * ProblemLocation Test Case
 *
 */
class ProblemLocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.problem_location',
		'app.problem',
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
		$this->ProblemLocation = ClassRegistry::init('ProblemLocation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProblemLocation);

		parent::tearDown();
	}

}
