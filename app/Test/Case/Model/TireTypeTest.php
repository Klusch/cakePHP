<?php
App::uses('TireType', 'Model');

/**
 * TireType Test Case
 *
 */
class TireTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tire_type',
		'app.tire',
		'app.tires_tire_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TireType = ClassRegistry::init('TireType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TireType);

		parent::tearDown();
	}

}
