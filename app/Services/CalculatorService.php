<?php namespace App\Services;

use Session;

class CalculatorService {

	public function __construct ()
	{
		// do things
	}

	public function clear ()
	{
		//return $this->calculation = "0";
		Session::flush();
		return "0";
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
		$total;

		if (Session::has("total")) {
			$total = Session::get("total");
		} else {
			$total = "0";
		}

		$total = $calcFn($total, $number, 32);
		$total = $this->rmTrailingZeroes($total);

		Session::flash("total", $total);

		return $total;

	}

	private function rmTrailingZeroes ($number)
	{
		$rex = ['/[\.][0]+$/','/([\.][0-9]*[1-9])([0]*)$/'];
		$replacement = ['', '$1'];
		return preg_replace($rex, $replacement, $number);
	}

}
