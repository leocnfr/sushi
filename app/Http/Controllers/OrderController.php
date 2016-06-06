<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {

        $orders=Orders::where('created_at',date('Y-m-d'));
        return view('orders',compact('orders'));
    }

    public function all()
    {
        $orders=Orders::all();
        return view('orders',compact('orders'));
    }
    public function store(Request $request)
    {
         $productId=$request->get('productId');
        $boissonId=$request->get('boissonId');
        $riz=$request->get('riz');
        $product=Product::findOrFail($productId);
        $boisson=Product::findOrFail($boissonId);

        $price=$product->price;
        return Cart::add($productId,$product->name,1,$price,['boisson'=>$boisson->name,'piece'=>$product->count,'riz'=>$riz]);
    }
    //查看panier数据
    public function panier()
    {
        $carts = Cart::all();
        $count=Cart::count();
        $piece=0;
        $price=0;
        foreach ($carts as $cart) {
            $piece+=$cart->piece;
            $price+=$cart->price;
        }

        return view('app.panier',compact('carts','piece','count','price'));
    }
    //删除
    public function destroy(Request $request)
    {
        $rawId=$request->get('rawid');
        if(Cart::remove($rawId))
        {
            return  Cart::all();
        };
    }
    public function toJson()
    {
        $carts = Cart::all();
//        $carts=Cart::all();
        return $carts;
    }

    public function update(Request $request)
    {
        if($request->get('type')=='add'){
            $rawid=$request->get('rawid');
            $count=$request->get('count')+1;
            Cart::update($rawid,$count);
        }else{
            $rawid=$request->get('rawid');
            $count=$request->get('count')-1;
            Cart::update($rawid,$count);
        }
        return  Cart::all();
    }

    public function saveOrder(Request $request)
    {
        $html='';
        $total_price=(int)0;
        $total_qty=0;
        $html.='<table style="border: 1px solid black;border-collapse: collapse;">';
        $html.='<tr style="border: 1px solid black">';
        $html.='<td style="border: 1px solid black">';
        $html.='menu';
        $html.='</td>';
        $html.='<td style="border: 1px solid black">';
        $html.='qty';
        $html.='</td>';
        $html.='<td style="border: 1px solid black">';
        $html.='riz';
        $html.='</td>';
        $html.='<td style="border: 1px solid black">';
        $html.='boisson';
        $html.='</td>';
        $html.='<td style="border: 1px solid black">';
        $html.='price';
        $html.='</td>';
        $html.='</tr>';
        foreach (Cart::all() as $cart) {
            $total_price+=(float)$cart->total;
            $total_qty+=$cart->qty;
            $html.='<tr style="border: 1px solid black">';
            $html.='<td style="border: 1px solid black">';
            $html.=$cart->name;
            $html.='</td>';
            $html.='<td style="border: 1px solid black">';
            $html.=$cart->qty;
            $html.='</td>';
            $html.='<td style="border: 1px solid black">';
            $html.=$cart->riz;
            $html.='</td>';
            $html.='<td style="border: 1px solid black">';
            $html.=$cart->boisson;
            $html.='</td>';
            $html.='<td style="border: 1px solid black">';
            $html.=$cart->total;
            $html.='</td>';
            $html.='</tr>';
        }
        $html.='<tr style="border: 1px solid black">';
        $html.='<td style="border: 1px solid black">';
        $html.='total:'.$total_price;
        $html.='</td>';
        $html.='</tr>';
        $html.='</table>';
        $order = new Orders();
        $order->user_id=Auth::user()->id;
        $order->content=$html;
        $order->price=$total_price;
        $order->address=Auth::user()->address;
        $order->zip_code=Auth::user()->zip_code;
        if($total_qty>5)
        {
            $order->is_pro=0;
        }else{
            //查询在此之前的订单距离小于100米的
            
        }

        $order->save();
        Cart::destroy();
        return redirect()->back();
    }


}
