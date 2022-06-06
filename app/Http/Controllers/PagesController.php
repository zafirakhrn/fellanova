<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view ('layouts/dashboard');
    }
    public function menu(){
        return view ('layouts/menu');
    }
    public function about(){
        return view ('layouts/about');
    }
    public function custom(){
        return view ('layouts/custom');
    }
    public function profile(){
        return view ('layouts/profile');
    }
    public function checkout(){
        return view ('layouts/checkout');
    }
    public function detail(){
        return view ('layouts/detail');
    }
}
