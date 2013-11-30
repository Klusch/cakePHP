<?php
App::uses('Temperature', 'Model');

/**
 * Temperature Test Case
 *
 */
class TemperatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.temperature',
		'app.unit',
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
		$this->Temperature = ClassRegistry::init('Temperature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Temperature);

		parent::tearDown();
	}

}
