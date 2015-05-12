<?php namespace App\Http\Middleware;

use Closure;
use Session;

class SessionMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	    Session::flash("value", $request->input("value"));

	    $response = $next($request);

	    // after…

	    return $response;
    }

}
