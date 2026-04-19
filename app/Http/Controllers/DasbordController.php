<?php

namespace App\Http\Controllers;

class DasbordController extends Controller
{
    public function ShowDasbord()
    {
        return view('Dasbord.Dasbord');
    }
}
