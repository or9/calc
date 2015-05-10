<?php namespace App\Services;

final class CalculatorService {

	protected $calculation = 0;

	public function add ($number)
	{
		return $this->calculation += $number;
	}
}
