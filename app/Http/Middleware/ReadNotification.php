<?php

namespace App\Http\Middleware;

use Closure;

class ReadNotification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!is_null($request->input('read'))){
            $user = \Auth::user();
            $user->unreadNotifications->where('id',$request->input('read'))->markAsRead();
        }

        return $next($request);
    }
}
