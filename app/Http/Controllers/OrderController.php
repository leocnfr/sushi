<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
         $productId=$request->get('productId');
        $product=Product::findOrFail($productId);
        $type=$request->get('type');
         if($type=='menu'){
                 return Cart::add($productId,$product->name,1,$product->price)->rawId();

//             Cart::add(37,$product->name,1,$product->price);
         }else{
             $rawId=$request->get('rawId');
             Cart::update($rawId,['boission'=>$product->name]);
             return Cart::get($rawId);
//             Cart::update(37,[boission=>$product->name]);
//             return Cart::get('37');
         }

    }

    public function toJson()
    {
        $carts = Cart::all();
//        $carts=Cart::all();
        return $carts;
    }
}
