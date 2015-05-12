<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App;

class Controller extends BaseController
{

	protected static $calcService;

	public function __construct ()
	{
		$this::$calcService = App::make("CalculatorService");
	}

	/**
	 * index
	 * @returns View
	 */
	public function index ()
	{
		return view("calculator")->with("calculation", 0);
	}

}
