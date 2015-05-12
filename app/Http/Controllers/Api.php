<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

final class Api extends Controller
{

	public function clear (Request $req)
	{
		$this::$calcService->clear();

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
		$value = $this::$calcService->$method($value);
		return response()->json(["value" => $value]);
	}
}
