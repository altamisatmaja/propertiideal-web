<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingLayout extends Controller
{
    public function index(){
        return view('user.index');
    }
}
