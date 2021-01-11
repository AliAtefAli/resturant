<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginPage()
    {
        return view('web.auth.login');
    }

    public function RegisterPage()
    {
        return view('web.auth.register');
    }

    public function forgetPassPage()
    {
        return view('web.auth.forget_password');
    }


}
