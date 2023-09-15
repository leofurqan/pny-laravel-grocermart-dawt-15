<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {
        $categories = Categories::all();
        $products = Products::all();
        return view('admin/dashboard')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
