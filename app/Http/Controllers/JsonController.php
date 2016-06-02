<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JsonController extends Controller
{
    //
    public function getTime(Request $request)
    {
        $id=$request->get('id');
        return Relais::findOrFail($id)->send_time;
    }
}
