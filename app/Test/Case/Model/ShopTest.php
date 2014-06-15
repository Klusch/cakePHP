<?php
App::uses('Shop', 'Model');

/**
 * Shop Test Case
 *
 */
class ShopTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shop',
		'app.utility',
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
		$this->Shop = ClassRegistry::init('Shop');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shop);

		parent::tearDown();
	}

}
