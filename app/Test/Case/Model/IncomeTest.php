<?php
App::uses('Income', 'Model');

/**
 * Income Test Case
 *
 */
class IncomeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.income',
		'app.category',
		'app.cost',
		'app.sub_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Income = ClassRegistry::init('Income');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Income);

		parent::tearDown();
	}

}
