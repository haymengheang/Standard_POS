<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPasswordExpiry
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

    if ($user && $user->changed_at) {
        $days = Carbon::parse($user->changed_at)->diffInDays(now());

        if ($days >= -5 &&
            !$request->routeIs('Change.Password') &&
            !$request->routeIs('Update.Password')) {

            return redirect()->route('Change.Password')
                ->with('warning', 'Password expired. Please change it.');
        }
    }
        return $next($request);
    }
}
