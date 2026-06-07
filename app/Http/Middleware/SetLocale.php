<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    // App::setLocale(session('locale', 'km'));
    // App::setLocale(session('locale', 'en'));
    //      dd(session('locale') );
    //     if (session('locale') == 'en') {

    //     App::setLocale(session('locale', 'en'));


    // } else {

    //    App::setLocale(session('locale', 'km'));

    //  }
        //   if (session()->has('locale')) {

        //     App::setLocale(session('locale'));

        // } else {

        //     App::setLocale('en');

        // }

       
        if (session()->has('locale')) {

        App::setLocale(session('locale'));

    } else {

        App::setLocale('en');

    }

        return $next($request);
    }


}
