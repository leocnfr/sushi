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

    public function showAll(Request $request)
    {
        if($request->get('query'))
        {
            $query=$request->get('query');
            $users=User::where('nom','like','%'.$query.'%')
                    ->orWhere('prenom','like','%'.$query.'%')
                    ->orWhere('tel','like','%'.$query.'%')
                    ->orWhere('societe','like','%'.$query.'%')
                    ->paginate(15);
        }else{
            $users=User::paginate(15);
        }
        return view('admin.user',compact('users'));
    }

    public function destroy(Request $request)
    {
        User::destroy($request->get('id'));
        return redirect()->back();
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.edit_user',compact('user'));
    }
}
