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
        return view('pointrelais.relais');
    }
    public function create()
    {
        return view('pointrelais.create');
    }
    public function insert(Request $request){
//        $validator=Validator::make($request->all())
        $pointRelais= new Relais();
        $pointRelais->name=$request->name;
        $pointRelais->address=$request->address;
        $pointRelais->intro=$request->intro;
        $pointRelais->save();
        dd($request);

    }
}
