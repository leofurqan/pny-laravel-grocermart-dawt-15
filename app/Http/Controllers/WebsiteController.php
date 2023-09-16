<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class WebsiteController extends Controller
{
    public function home()
    {
        $categories = Categories::all();
        return view('index')->with('categories', $categories);
    }

    public function shop()
    {
        $count = Cart::name('grocer-mart')->countItems();
        $total = Cart::name('grocer-mart')->getItemsSubtotal();
        $categories = Categories::all();
        $products = Products::all();
        return view('shop')->with([
            'items_count' => $count,
            'total' => $total,
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function details(Request $request)
    {
        $count = Cart::name('grocer-mart')->countItems();
        $total = Cart::name('grocer-mart')->getItemsSubtotal();
        $product_id = $request->id;
        $categories = Categories::all();
        $product = Products::find($product_id);

        return view('shop-detail')->with([
            'items_count' => $count,
            'total' => $total,
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function addToCart(Request $request)
    {
        $product_id = $request->id;
        $product = Products::find($product_id);

        $shoppingCart   = Cart::name('grocer-mart');
        $shoppingCart->addItem([
            'id' => $product->id,
            'title' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price
        ]);

        return redirect('shop');
    }

    public function cart()
    {
        $count = Cart::name('grocer-mart')->countItems();
        $total = Cart::name('grocer-mart')->getItemsSubtotal();
        $items = Cart::name('grocer-mart')->getItems();
        $categories = Categories::all();

        return view('cart')->with([
            'items_count' => $count,
            'total' => $total,
            'categories' => $categories,
            'items' => $items
        ]);;
    }

    public function contact()
    {
        return view('contact');
    }
}
