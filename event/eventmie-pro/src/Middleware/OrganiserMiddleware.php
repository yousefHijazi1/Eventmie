<?php namespace Classiebit\Eventmie\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OrganiserMiddleware {

    public function handle($request, Closure $next)
    {
        if(Auth::check() && (Auth::user()->hasRole('organiser') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('agent') || Auth::user()->hasRole('pos') || Auth::user()->hasRole('sponsor') ) )
        {
            return $next($request);
        }
        
        return redirect()->route('eventmie.welcome');
    }
}