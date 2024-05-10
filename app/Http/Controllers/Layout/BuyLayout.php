<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyLayout extends Controller
{
    public function index(){
        return view('user.pages.buy_pages.index');
    }
}
