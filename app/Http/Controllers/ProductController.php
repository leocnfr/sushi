<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::latest()->paginate(10);
        return view('products.products',compact('products'));
    }
    public function create(){
        $cates=Category::all();
        return view('products.create',compact('cates'));
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

    public function store(Request $request)
    {
        $product= new Product();
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->content=$request->get('intro');
        $file=$request->file('photo');
        $request->file('photo')->move(('storage/uploads'),$file->getClientOriginalName());
        $product->productImage=$file->getClientOriginalName();
        $product->save();

        return redirect('/admin/products');
    }
}
