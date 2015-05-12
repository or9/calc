<?php namespace App\Services;

final class CalculatorService {

	protected $calculation = "0";

	public function __construct ()
	{
		// do things
	}

	public function clear ()
	{
		return $this->calculation = 0;
	}

	/**
	 * @return integer|float
	 */
	public function add ($number)
	{
		return $this->calculate($number, "bcadd");
	}

	/*
	 * @return integer|float
	 */
	public function subtract ($number)
	{
		return $this->calculate($number, "bcsub");
	}

	/*
	 * @return integer|float
	 */
	public function multiply ($number)
	{
		return $this->calculate($number, "bcmul");
	}

	/**
	 * @return float
	 */
	public function divide ($number)
	{

		if ((string) $number === "0") {
			return NAN;
		}

		return $this->calculate($number, "bcdiv");

	}

	private function calculate ($number, $calcFn)
	{
		$number = (string) $number;
		$this->calculation = (string) $this->calculation;

		$this->calculation = $calcFn($this->calculation, $number, 32);
		$this->calculation = $this->rmTrailingZeroes($this->calculation);

		return $this->calculation;

	}

	private function rmTrailingZeroes ($number)
	{
		$rex = ['/[\.][0]+$/','/([\.][0-9]*[1-9])([0]*)$/'];
		$replacement = ['', '$1'];
		return preg_replace($rex, $replacement, $number);
	}

}
