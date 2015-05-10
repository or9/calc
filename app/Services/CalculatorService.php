<?php namespace App\Services;

final class CalculatorService {

	protected $calculation = 0;

	/**
	 * @return integer|float
	 */
	public function add ($number)
	{
		return $this->calculation += $number;
	}

	/*
	 * @return integer|float
	 */
	public function subtract ($number)
	{
		return $this->calculation -= $number;
	}

	/*
	 * @return integer|float
	 */
	public function multiply ($number)
	{
		return $this->calculation *= $number;
	}

	/**
	 * @return float
	 */
	public function divide ($number)
	{
		if ($number === 0) {
			return NAN;
		}

		return $this->calculation /= $number;
	}
}
