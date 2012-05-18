<?php
require_once dirname(__FILE__) . '/../../../inc/training/class.Splits.php';

/**
 * Test class for Splits.
 * Generated by PHPUnit on 2012-05-04 at 09:12:51.
 */
class SplitsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Splits
	 */
	protected $object;

	/**
	 * Test empty splits 
	 * @covers Splits::areEmpty
	 */
	public function testEmpty() {
		$Splits = new Splits();

		$this->assertEmpty( $Splits->asArray() );
		$this->assertEmpty( $Splits->asString() );
		$this->assertEmpty( $Splits->asReadableString() );
		$this->assertTrue( $Splits->areEmpty() );
	}

	/**
	 * Test creationg from post without flag 
	 */
	public function testNoCreateFromPostWithoutFlag() {
		$_POST['splits'] = '1|4:20-2.4|10:09-10|1:00:00';

		$Splits = new Splits();

		$this->assertTrue( $Splits->areEmpty() );
	}

	/**
	 * Test creation from post
	 */
	public function testCreateFromPostString() {
		$_POST['splits'] = '1|4:20-2.4|10:09-10|1:00:00';

		$Splits = new Splits( Splits::$FROM_POST );
		$this->assertEquals( '1.00|4:20-2.40|10:09-10.00|1:00:00', $Splits->asString() );
	}

	/**
	 * Test creation from post
	 */
	public function testCreateFromPostArray() {
		$_POST['splits'] = array(
			'km' => array(1.2, 0.4, 1),
			'time' => array('5:20', '1:20', '3:17')
		);

		$Splits = new Splits( Splits::$FROM_POST );
		$this->assertEquals( '1.20|5:20-0.40|1:20-1.00|3:17', $Splits->asString() );
	}

	/**
	 * @covers Splits::asArray
	 */
	public function testAsArray() {
		$Splits = new Splits('1|4:20-2.4|10:09-10|1:00:00');

		$this->assertEquals( array(
				array('km' => 1, 'time' => '4:20'),
				array('km' => 2.4, 'time' => '10:09'),
				array('km' => 10, 'time' => '1:00:00')
			), $Splits->asArray() );
	}

	/**
	 * @covers Splits::asString
	 * @todo Implement testAsString().
	 */
	public function testAsString() {
		$Splits = new Splits('1|4:20-2.4|10:09-10|1:00:00');

		$this->assertEquals( '1.00|4:20-2.40|10:09-10.00|1:00:00', $Splits->asString() );
	}

	/**
	 * @covers Splits::asReadableString
	 */
	public function testAsReadableString() {
		$Splits = new Splits('1|4:20-1|4:09');

		$this->assertEquals( '1.00&nbsp;km&nbsp;in&nbsp;4:20, 1.00&nbsp;km&nbsp;in&nbsp;4:09', $Splits->asReadableString() );
	}

}
?>