<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();
        return view('products.products',compact('products'));
    }
    public function create(){
        return view('products.create');
    }

    public function edit($id){
        $product=Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }
    public function update($id){
        $product=Product::findOrFail($id);
        Storage::put(
            'avatars/'.$product->id,
            file_get_contents($request->file('avatar')->getRealPath())
        );
    }
}
