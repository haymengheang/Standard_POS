<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DasbordController extends Controller
{
    public function ShowDasbord(){
        if (Auth::check()){
            return view('Dasbord.Dasbord');
            //  return redirect()->route('Show.Dasbord');
        }else{
            return view('AuthLogin.Login');
        }
         
    }
}
