<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellLayout extends Controller
{
    public function index(){
        return view('user.pages.sell_pages.index');
    }
}
