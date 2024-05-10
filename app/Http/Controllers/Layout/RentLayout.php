<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentLayout extends Controller
{
    public function index(){
        return view('user.pages.rent_pages.index');
    }
}
