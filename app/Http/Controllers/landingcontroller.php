<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingcontroller extends Controller
{
    public function Landingpage()
    {
        return view('landing');
    }
}
