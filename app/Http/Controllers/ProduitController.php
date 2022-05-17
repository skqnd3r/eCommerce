<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProduitController extends Controller
{
    public function show($id){
        $product = Product::find($id);
        return view('produit', ['product' => $product]);
    }


}
