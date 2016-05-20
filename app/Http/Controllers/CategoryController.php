<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    //
    public function show()
    {
        $cates= Category::latest()->paginate(10);
        return view('category.category',compact('cates'));
    }

    public function update(Request $request)
    {
         $cate=Category::findOrFail($request->get('cat_id'));
         $cate->cat_name=$request->get('cat_name');
         $cate->save();
        return redirect('/admin/category')->with('status','更新成功');
    }

    public function store(Request $request)
    {
        $cate = new Category();
        $cate->cat_name=$request->get('cat_name');
        $cate->save();
        return redirect('/admin/category');
    }

    public function destroy($id)
    {
        $cate=Category::findOrFail($id);
        $cate->delete();
        return redirect('/admin/category');

    }
}
