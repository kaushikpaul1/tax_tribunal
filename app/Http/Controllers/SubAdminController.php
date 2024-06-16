<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SubAdminController extends Controller
{
    //
    public function dashboardCourt()
    {
        return view('court.dashboard');
    }
}
