<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function show()
    {
        return view('admin');
    }

    public function create(Request $request)
    {
        $alt = $request->file('img')->getClientOriginalName();
        $request->merge(['alt' => $alt]);

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:products,title',
            'desc' => 'required',
            'price' => 'required|numeric|between:0,10000.00',
            'quant' => 'required',
            'alt' => 'unique:products,alt',
            'img' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin')->withErrors($validator)->withInput();
        } else {

            $request->file('img')->storeas('public/products/', $request->alt);
            $path = asset('storage/products/' . $request->alt);

            Product::create([
                'title' => $request->title,
                'description' => $request->desc,
                'quantity' => $request->quant,
                'price' => $request->price,
                'alt' => $request->alt,
                'img' => $path
            ]);

            return redirect('catalogue');
        }
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        if ($request->file('img') != null) {
            $alt = $request->file('img')->getClientOriginalName();
            $request->merge(['alt' => $alt]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|unique:products,title',
            'price' => 'nullable|numeric|between:0,10000.00',
            'alt' => 'nullable|unique:products,alt',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->file('img') != null) {
                File::delete(storage_path('app/public/products/' . $product->alt));
                $request->file('img')->storeas('public/products/', $alt);
                $path = asset('storage/products/' . $alt);
                Product::where('id', $id)->update(['img' => $path]);
                Product::where('id', $id)->update(['alt' => $request->alt]);
            }

            if (request()->filled('title')) {
                Product::where('id', $id)->update(['title' => $request->title]);
            }

            if (request()->filled('desc')) {
                Product::where('id', $id)->update(['description' => $request->desc]);
            }

            if (request()->filled('quant')) {
                Product::where('id', $id)->update(['quantity' => $request->quant]);
            }

            if (request()->filled('price')) {
                Product::where('id', $id)->update(['price' => $request->price]);
            }

            return redirect('catalogue');
        }
    }
}
