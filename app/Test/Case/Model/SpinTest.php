<?php
App::uses('Spin', 'Model');

/**
 * Spin Test Case
 *
 */
class SpinTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.spin',
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
		$this->Spin = ClassRegistry::init('Spin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Spin);

		parent::tearDown();
	}

}
