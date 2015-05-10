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

	public function floatAdd ()
	{
		$calc = new CalculatorService;
		$this->assertEquals(0.1, $calc->add(0.1));
	}

}
