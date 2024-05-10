<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolutionsLayout extends Controller
{
    public function index(){
        return view('user.pages.solutions_pages.index');
    }
}
