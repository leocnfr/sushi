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
        $this->middleware('web');
    }
    //
    public function store(Request $request)
    {
         $productId=$request->get('productId');
        $boissonId=$request->get('boissonId');
        $product=Product::findOrFail($productId);
        $boisson=Product::findOrFail($boissonId);
        $price=$product->price;
        return Cart::add($productId,$product->name,1,$price,['boisson'=>$boisson->name,'piece'=>$product->count]);
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
