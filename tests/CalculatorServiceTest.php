<?php namespace App\Services;

class CalculatorServiceTest extends \TestCase {

	public function testAdd ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(0, $calc->add(0));
		$this->assertEquals(1, $calc->add(1));
	}

	public function testStatefulAdd ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(2, $calc->add(2));
		$this->assertEquals(20, $calc->add(18));
	}

	public function testFloatAdd ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(0.1, $calc->add(0.1));
	}


	public function testSubtract ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(-12, $calc->subtract(12));
		$this->assertEquals(-5, $calc->subtract(-7));
	}

	public function testFloatSubtract ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(-1234567890.1234567890, $calc->subtract(1234567890.1234567890));
	}

	public function testMultiply ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(0, $calc->multiply(0));
		$calc->add(12);
		$this->assertEquals(144, $calc->multiply(12));
	}

	public function testNegativeMultiply ()
	{
		$calc = new CalculatorService;
		$calc->add(-2);
		$this->assertEquals(4, $calc->multiply(-2));
		$this->assertEquals(-4096, $calc->multiply(-1024));
	}

	public function testFloatMultiply ()
	{
		$calc = new CalculatorService;
		$calc->add(8);
		$this->assertEquals(792.008, $calc->multiply(99.001));
	}

	public function testDivide ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(true, is_nan($calc->divide(0)));
		$calc->add(63);
		$this->assertEquals(7, $calc->divide(9));
	}

	public function testNegativeDivide ()
	{
		$calc = new CalculatorService;
		$calc->add(20);
		$this->assertEquals(-2, $calc->divide(-10));
		$this->assertEquals(0.2, $calc->divide(-10));
	}

	public function testFloatDivide ()
	{
		$calc = new CalculatorService;
		$calc->add(486);
		$this->assertEquals(4860, $calc->divide(0.1));
		$this->assertEquals(0.49999485602, $calc->divide(9720.1));
	}
}
