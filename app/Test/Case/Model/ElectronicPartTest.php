<?php
App::uses('ElectronicPart', 'Model');

/**
 * ElectronicPart Test Case
 *
 */
class ElectronicPartTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.electronic_part',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ElectronicPart = ClassRegistry::init('ElectronicPart');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ElectronicPart);

		parent::tearDown();
	}

}
