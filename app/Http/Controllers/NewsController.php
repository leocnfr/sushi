<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    //
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $news=News::addNews($request->all());
        return redirect('/admin/news/'.$news->id);
    }

    public function upload(Request $request)
    {
        $file=$request->file('wangEditorH5File');
        $request->file('wangEditorH5File')->move(('storage/uploads'),$file->getClientOriginalName());
        echo $file->getClientOriginalName();
    }

    public function show()
    {
        $news =  News::latest()->paginate(10);
        return view('news.show',compact('news'));
    }

    public function edit($id)
    {
        $news=News::findOrFail($id);
        return view('news.edit',compact('news'));
    }

    public function destroy(Request $request)
    {
        $id=$request->get('id');
        News::destroy($id);
        return redirect()->back();
    }

    public function update($id)
    {
        $news=News::findOrFail($id);
        return view('news.update',compact('news'));
    }

    public function storeUpdate(Request $request)
    {
        News::findOrFail($request->get('id'))->update($request->all());
        return redirect('/admin/news/'.$request->get('id'));
    }
}
