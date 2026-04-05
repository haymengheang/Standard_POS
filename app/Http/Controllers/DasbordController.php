<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasbordController extends Controller
{
    public function ShowDasbord(){
        return view('Dasbord.Dasbord');
    }
}
