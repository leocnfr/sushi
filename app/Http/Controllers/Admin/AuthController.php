<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    //
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin';
    protected $guard = 'admin';
    protected $loginView = 'admin.auth.login';
    protected $registerView = 'admin.auth.register';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'getLogout']);
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|confirmed|min:6',
        ]);

    }

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function getRegister()
    {
        return view('admin.auth.register');
    }

    public function postLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            // Authentication passed...
            return redirect('/admin');
        }else{
            return redirect('/admin/login')->withInput();
        }
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'email|required|unique:admins',
            'password'=>'min:6|confirmed|required',
            'password_confirmation'=>'required|min:6'
        ]);
        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect('/admin');
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');

    }
}
