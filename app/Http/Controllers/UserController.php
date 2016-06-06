<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function saveInfo(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $user->societe=$request->get('societe');
        $user->tel=$request->get('tel');
        $user->address=$request->get('address');
        $user->lib_address=$request->get('lib_address');
        $user->zip_code=$request->get('post');
        $user->save();
        return redirect()->back();
    }

    public function showAll()
    {
        $users=User::all();
        return view('user',compact('users'));
    }
}
