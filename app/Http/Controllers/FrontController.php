<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Relais;
use Illuminate\Http\Request;
use App\Http\Requests;
use Cart;

class FrontController extends Controller
{
    //
    //menu显示
    public function getMenu($menu=null)
    {
//        if($request->get('cat'))
//        {
//            $product_menu=Product::where('cat_id',$request->get('cat'))->get();
//        }
        $cates=Category::where('order','>','0')->orderBy('order')->get();
        $products=Product::groupBy('cat_id')->orderBy('cat_id','desc')->get();
        if($menu==null)
        {
            $products=Product::where('cat_id','!=',6)->orderBy('cat_id','desc')->paginate(12);
            return view('app.menus',compact('products','cates'));
        }else{
            $menu=str_replace('-',' ',$menu);
            $cate=Category::where('cat_name',$menu)->first();
            $products=Product::where('cat_id',$cate->id)->paginate(12);
            return view('app.menus',compact('products','cate','cates'));
        }


    }

    //地图json
    public function toJson()
    {
        return Relais::all();
    }
    
    //新闻页面显示
    public function news()
    {
        return view('app.news');
    }
    
    //付款确认页面
    public function checkout()
    {
        $orders=Cart::all();
        $total=Cart::totalPrice();
        return view('app.checkout',compact('orders','total'));
    }
}
