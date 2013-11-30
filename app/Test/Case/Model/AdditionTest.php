<?php
App::uses('Addition', 'Model');

/**
 * Addition Test Case
 *
 */
class AdditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.addition',
		'app.additions_washing_machine',
		'app.washing_machine',
		'app.program'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Addition = ClassRegistry::init('Addition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Addition);

		parent::tearDown();
	}

}
