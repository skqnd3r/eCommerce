<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Mockery\Undefined;

class CartController extends Controller
{
    public function show()
    {
        // return dd($_COOKIE['cartsave']);
        if (isset($_COOKIE['cartsave'])) {
            $cart = json_decode($_COOKIE['cartsave']);
            $products = Product::all();
            return view('panier', ['cart' => $cart])->with('products', $products);
        } else {
            return redirect()->back();
        }
    }
}
