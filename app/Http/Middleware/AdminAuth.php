<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('admin_logged_in')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
