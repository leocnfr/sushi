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
    public function index()
    {
        $products=Product::latest()->paginate(10);
        return view('products.products',compact('products'));
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
            unlink('storage/uploads/'.$product->productImage);
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
        $file=$request->file('photo');
        $request->file('photo')->move(('storage/uploads'),$file->getClientOriginalName());
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
}
