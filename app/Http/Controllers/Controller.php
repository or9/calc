<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	/**
	 * index
	 * @returns View
	 */
	public function index ()
	{
		return view("calculator")->with("calculation", 0);
	}

}
