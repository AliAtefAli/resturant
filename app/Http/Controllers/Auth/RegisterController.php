<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['phone'] = editPhone($data['phone']);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'unique:users', 'string', 'phone:SA'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required'],
            'policy' => ['required'],
        ], [
            'name.required' => (trans('validation.field_required_name')),
            'email.required' => (trans('validation.field_required_email')),
            'email.email' => (trans('validation.field_email')),
            'email.unique' => (trans('validation.field_exists_email')),
            'phone.required' => (trans('validation.field_required_phone')),
            'phone.unique' => (trans('validation.field_exists_phone')),
            'phone.phone' => (trans('validation.Please Enter Correct saudi arabia phone')),
            'password.required' => (trans('validation.field_required_password')),
            'password.min' =>(trans('validation.field_min_8')),
            'password.confirmed' => (trans('validation.password_confirmed')),
            'address.required' => (trans('validation.field_required_address')),
            'policy.required' => (trans('validation.policy'))
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['phone'] = editPhone($data['phone']);
        return User::create($data);
    }
}
