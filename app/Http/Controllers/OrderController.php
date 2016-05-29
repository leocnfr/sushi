<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
         $productId=$request->get('productId');
        $product=Product::findOrFail($productId);

        return $product;
    }

    public function toJson()
    {

    }
}
