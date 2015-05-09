<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Request;

class Calculator extends Controller
{
	/**
	 * index
	 * @returns View
	 */
	public function index ()
	{
		return view("calculator", ["calculation" => 0]);
	}
}
