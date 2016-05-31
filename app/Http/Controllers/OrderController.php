<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function store(Request $request)
    {
         $productId=$request->get('productId');
        $product=Product::findOrFail($productId);
        $type=$request->get('type');
         if($type=='menu'){

             return Cart::add($productId,$product->name,1,$product->price,['piece'=>$product->count])->rawId();

//          Cart::add(37,$product->name,1,$product->price);
         }else{
             $rawId=$request->get('rawId');
             Cart::update($rawId,['boission'=>$product->name]);
             return Cart::get($rawId);
//             Cart::update(37,[boission=>$product->name]);
//             return Cart::get('37');
         }

    }
    //查看panier数据
    public function panier()
    {
        $carts = Cart::all();
        return view('app.panier',compact('carts'));
    }
    //删除
    public function destroy(Request $request)
    {
        $rawId=$request->get('rawId');
        if(Cart::remove($rawId))
        {
            return '200';
        };
    }
    public function toJson()
    {
        $carts = Cart::all();
//        $carts=Cart::all();
        return $carts;
    }
}
