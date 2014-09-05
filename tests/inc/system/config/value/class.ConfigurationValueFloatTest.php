<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2014-09-05 at 11:38:14.
 */
class ConfigurationValueFloatTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var ConfigurationValueFloat
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new ConfigurationValueFloat('key', array('default' => 3.14));
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		
	}

	/**
	 * @covers ConfigurationValueFloat::setFromString
	 */
	public function testSet() {
		$this->assertEquals(3.14, $this->object->value());
		$this->assertEquals('3.14', $this->object->valueAsString());

		$this->object->set(5);
		$this->assertEquals(5, $this->object->value());
		$this->assertEquals('5', $this->object->valueAsString());

		$this->object->setFromString('17');
		$this->assertEquals(17, $this->object->value() );
	}

}
