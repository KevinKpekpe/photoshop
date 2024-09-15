<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $url = $request->path();

        if (preg_match('/^admin/', $url)) {
            if ($user->role == 'Admin') {
                return $next($request);
            } else {
                return response()->view('Https.403');
            }
        }

        return $next($request);
    }
}
