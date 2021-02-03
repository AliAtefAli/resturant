<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if (auth()->user() && auth()->user()->type == 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

//     protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }
        else{
            $request['email'] = str_replace(' ', '', $request['email']);
            $request['email'] = str_replace('-', '', $request['email']);
            $request['phone'] = editPhone($request['email']);
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return back();
    }
}
