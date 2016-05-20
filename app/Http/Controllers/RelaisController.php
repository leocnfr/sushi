<?php

namespace App\Http\Controllers;

use App\Relais;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class RelaisController extends Controller
{
    //
    public  function show()
    {
        $relais=Relais::showAll();
        return view('pointrelais.relais',compact('relais'));
    }
    public function create()
    {
        return view('pointrelais.create');
    }
    public function insert(Request $request)
    {

        $relais = new Relais();
        $data=$request->all();
        $relais->create($data);
        return view('pointrelais.relais');
    }

    public function destroy(Request $request)
    {
        $id=$request->id;
        Relais::delRelais($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $relais=Relais::findOrFail($id);
        return view('pointrelais.edit',compact('relais'));
    }

    public function update(Request $request)
    {
          Relais::updateRelais($request->id,$request->all());
          return redirect()->back();
    }
}
