<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use Closure;

class Tutor
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
        if ($request->user() && $request->user()->type !="tutor"){

            return new Response(view('unauthorized')->with('role', 'TUTOR'));
        }

        return $next($request);

    }
}
