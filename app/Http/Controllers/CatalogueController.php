<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogueController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('catalogue')->with('products', $products);
    }
}
