<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cekUsia
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->age < 18) {
            return redirect('/');
        }

        return $next($request);
    }
}