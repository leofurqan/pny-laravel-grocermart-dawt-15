<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home() {
        $categories = Categories::all();
        return view('index')->with('categories', $categories);
    }

    public function shop() {
        $categories = Categories::all();
        $products = Products::all();
        return view('shop')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function contact() {
        return view('contact');
    }
}
