<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,
            [
                'nom'=>'required',
                'prenom'=>'required',
                'sex'=>'required',
                'email'=>'required|unique:users|email',
                'password'=>'required|min:6|confirmed',

            ]);
        User::create([
                'nom'=>$request->get('nom'),
                'sex'=>$request->get('sex'),
                'prenom'=>$request->get('prenom'),
                'email'=>$request->get('email'),
                'password'=>bcrypt($request->get('password'))
            ]);

        Auth::guard('web')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);
            return redirect('/compte');
    }

    public function postLogin(Request $request)
    {

        if(Auth::guard('web')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){
            return redirect('/panier');
        }else{
            return redirect()->back()->withInput();
        }

    }
}
