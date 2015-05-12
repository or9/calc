<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalculatorService;

final class Api extends Controller
{

	protected $calc;

	public function __construct (CalculatorService $calculatorService)
	{
		$this->calc = $calculatorService;
	}

	public function clear (Request $req)
	{
		$this->calc->clear();

		return response()->json(["value" => "0"]);
	}

	/**
	 * add
	 * @returns integer|float
	 */
	public function add (Request $req)
	{
		return $this->calcResponse($req, "add");
	}

	/**
	 * subtract
	 * @returns integer|float
	 */
	public function subtract (Request $req)
	{
		return $this->calcResponse($req, "subtract");
	}

	/**
	 * multiply
	 * @returns integer|float
	 */
	public function multiply (Request $req)
	{
		return $this->calcResponse($req, "multiply");
	}

	/**
	 * divide
	 * @returns integer|float
	 */
	public function divide (Request $req)
	{
		return $this->calcResponse($req, "divide");
	}

	private function calcResponse ($req, $method)
	{
		$value = $req->input("value");
		$value = $this->calc->$method($value);
		return response()->json(["value" => $value]);
	}
}
