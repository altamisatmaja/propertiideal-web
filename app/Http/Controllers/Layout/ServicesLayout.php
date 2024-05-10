<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesLayout extends Controller
{
    public function index(){
        return view('user.pages.services_pages.index');
    }
}
