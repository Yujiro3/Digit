<?php
require_once './Digit/Digit.php';

/**
 * Digitテストクラス
 *
 * @package         Digit
 * @subpackage      Library
 * @author          Yujiro Takahashi <yujiro3@gamil.com>
 */
class DigitTest extends PHPUnit_Framework_TestCase {
	/**
	 * 2進数の確認
	 *
	 * @access public
	 * @return void
	 */
    public function testBin() {
		$digit = new Digit(array('0', '1'));

		$number = 85479;
		$this->assertEquals(decbin($number), $digit->encode($number));

		$number = '100110110110';
		$this->assertEquals(bindec($number), $digit->decode($number));
	}

	/**
	 * 8進数の確認
	 *
	 * @access public
	 * @return void
	 */
    public function testOct() {
		$map   = array_merge(range('0', '7'));
		$digit = new Digit($map);

		$number = 751046;
		$this->assertEquals(decoct($number), $digit->encode($number));

		$number = '2323575';
		$this->assertEquals(octdec($number), $digit->decode($number));
	}

	/**
	 * 16進数の確認
	 *
	 * @access public
	 * @return void
	 */
    public function testHex() {
		$map   = array_merge(range('0', '9'), range('a', 'f'));
		$digit = new Digit($map);

		$number = 68542;
		$this->assertEquals(dechex($number), $digit->encode($number));

		$number = '88acc0';
		$this->assertEquals(hexdec($number), $digit->decode($number));
	}

	/**
	 * 20進数の確認
	 *
	 * @access public
	 * @return void
	 */
    public function testBase20() {
		$map   = array_merge(range('0', '9'), range('a', 'j'));
		$digit = new Digit($map);

		$number = 86317397;
		$base  = base_convert($number, 10, 20);
		$this->assertEquals($base, $digit->encode($number));

		$number = '3d232jgc';
		$base  = base_convert($number, 20, 10);
		$this->assertEquals($base, $digit->decode($number));
	}

	/**
	 * 36進数の確認
	 *
	 * @access public
	 * @return void
	 */
    public function testBase36() {
		$map   = array_merge(range('0', '9'), range('a', 'z'));
		$digit = new Digit($map);

		$number = 578934734;
		$base  = base_convert($number, 10, 36);
		$this->assertEquals($base, $digit->encode($number));

		$number = 'bfg5wyj2';
		$base  = base_convert($number, 36, 10);
		$this->assertEquals($base, $digit->decode($number));
	}

	/**
	 * 62進数の確認
	 *
	 * @access public
	 * @return void
	 */
    public function testBase62() {
		$map = array_merge(range('0', '9'), range('a', 'z'), range('A', 'Z'));
		$digit = new Digit($map);

		// http://www.pionic-rour.com/works/script/1062.htm
		$number = 45783278930;
		$this->assertEquals('NYpYiK', $digit->encode($number));

		$number = '67e4Lsr5';
		$this->assertEquals('21540185562055', $digit->decode($number));
	}
} // class DigitTest extends PHPUnit_Framework_TestCase
