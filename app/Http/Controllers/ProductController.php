<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //显示产品
    public function index(Request $request)
    {
        if($request->get('cateBy'))
        {
            $cate=Category::where('cat_name',$request->get('cateBy'))->first();
            $products=Product::where('cat_id',$cate->id)->latest()->get();
        }else{
            $products=Product::latest()->paginate(10);
        }
        $cates=Category::all();
        return view('products.products',compact('products','cates'));
    }
    //显示创建产品页面
    public function create(){
        $cates=Category::all();
        return view('products.create',compact('cates'));
    }
    //编辑产品
    public function edit($id){
        $product=Product::findOrFail($id);
        $cates=Category::all();
        return view('products.edit',compact('product','cates'));
    }
    //更新
    public function update(Request $request){
        $product=Product::findOrFail($request->id);
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->content=$request->get('intro');
        $product->count=$request->get('count');
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $request->file('photo')->move(('storage/uploads'),$file->getClientOriginalName());
            $product->productImage=$file->getClientOriginalName();
        }
        $product->save();
        return redirect()->back()->with('status','更新成功');
    }

    //存储
    public function store(Request $request)
    {
        $product= new Product();
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->content=$request->get('intro');
        $product->count=$request->get('count');
        $product->cat_id=$request->get('cat_id');
        $file=$request->file('productImage');
        $request->file('productImage')->move(('storage/uploads'),$file->getClientOriginalName());
        $product->productImage=$file->getClientOriginalName();
        $product->save();
        return redirect('/admin/products');
    }

    //删除
    public function delete(Request $request)
    {
        $product=Product::findOrFail($request->get('id'));
        unlink('storage/uploads/'.$product->productImage);
        $product->delete();
        return redirect()->back();
    }

    //menu显示
    public function getMenu(Request $request)
    {
//        if($request->get('cat'))
//        {
//
//            $product=Product::where('cat_id',$request->get('cat'))->get();
//        }

        $products=Product::groupBy('cat_id')->orderBy('cat_id','desc')->get();
        return view('app.menus',compact('products'));

    }

}
