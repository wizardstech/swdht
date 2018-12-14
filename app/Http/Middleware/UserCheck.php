<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use \Illuminate\Http\Request;

class UserCheck extends Middleware 
{

    public function handle($request, Closure $next, ...$guards){
        
        if(self::userTest()){
            return $next($request);
        }
        return redirect('home');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected static function userTest()
        {   
            return \Auth::user()->role === 'admin';
        }
}
