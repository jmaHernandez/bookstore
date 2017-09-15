<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        if (\Gate::allows('admin-access')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Not Admiin !!!');
    }
}
