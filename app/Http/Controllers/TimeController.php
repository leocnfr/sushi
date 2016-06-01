<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

use App\Http\Requests;

class TimeController extends Controller
{
    //
    public function store(Request $request)
    {
        Time::create($request->all());
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Time::destroy($request->get('id'));
        return redirect()->back();
    }
}
