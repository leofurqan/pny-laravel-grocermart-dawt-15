<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home() {
        return view('index');
    }

    public function shop() {
        return view('shop');
    }

    public function contact() {
        return view('contact');
    }
}
