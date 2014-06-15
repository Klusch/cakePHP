<?php
App::uses('Utility', 'Model');

/**
 * Utility Test Case
 *
 */
class UtilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.utility',
		'app.shop',
		'app.troubleshooting',
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
		$this->Utility = ClassRegistry::init('Utility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Utility);

		parent::tearDown();
	}

}
