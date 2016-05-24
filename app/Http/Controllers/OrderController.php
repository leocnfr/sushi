<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
         $productId=$request->get('productId');
         return  Product::findOrFail($productId);

    }
}
