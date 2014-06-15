<?php
App::uses('Color', 'Model');

/**
 * Color Test Case
 *
 */
class ColorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.color',
		'app.priority',
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
		$this->Color = ClassRegistry::init('Color');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Color);

		parent::tearDown();
	}

}
