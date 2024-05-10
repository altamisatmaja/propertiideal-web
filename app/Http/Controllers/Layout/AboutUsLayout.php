<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsLayout extends Controller
{
    public function index(){
        return view('user.pages.about_us_pages.index');
    }
}
