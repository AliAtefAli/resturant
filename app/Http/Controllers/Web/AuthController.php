<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\NewsLetter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function resetUserPassword()
    {
        return view('auth.passwords.forget');
    }

    public function getCode(Request $request)
    {
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {

            $request->validate([
                'email' => 'required|exists:users,email',
            ],
                [
                    'email.required' => (trans('validation.field_required')),
                    'email.exists' => (trans('validation.These credentials is wrong')),
                ]);

            $user = User::where('email', $request->get('email'))->first();

            $code = mt_rand(1111, 9999);
            $user->update(['code' => $code]);

            return redirect()->route('code_confirm', $user);
        }

        $request->validate([
            'email' => 'required|exists:users,phone',
        ],
            [
                'email.required' => (trans('validation.field_required')),
                'email.exists' => (trans('validation.These credentials is wrong')),
            ]);

        $user = User::where('phone', $request->get('email'))->first();

        $code = mt_rand(1111, 9999);
        $user->update(['code' => $code]);

        return redirect()->route('code_confirm', $user);
    }

    public function codePage(User $user)
    {
        return view('auth.passwords.code', compact('user'));
    }

    public function codeConfirm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'code' => 'required|exists:users,code'
        ],
            [
                'password.required' => (trans('validation.field_required_password')),
                'password.confirmed' => (trans('validation.password_confirmed')),
                'password.min' => (trans('validation.field_min_8')),
                'code.required' => (trans('validation.field_required_code')),
                'code.exists' => (trans('validation.field_wrong_code')),
            ]);

        $user = User::find($request->user_id);

        if ($user->code == $request->code && $user->code != null) {
            $password = Hash::make($request->password);
            $user->update([
                'password' => $password,
                'code' => null
            ]);
        }

        return redirect()->route('home')->with('success', trans('site.Password Changed Successfully'));
    }

    public function joinUs(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'email' => 'required|unique:news_letters',
        ], [
            'email.required' => (trans('validation.field_required_email')),
            'email.unique' => (trans('validation.field_exists_email'))
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        NewsLetter::create($request->all());

        return back()->with('success', trans('site.Added successfully'));
    }

    public function getChangePassword()
    {
        return view('web.users.change-password');
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        if (Hash::check($request->old_password, $user->password)) {
            $user->update(['password' => Hash::make($request->password)]);

            return back()->with('success', trans('site.Password Changed Successfully'));
        } else {
            return back()->with('error', trans('site.Wrong Password, please try again'));
        }
    }

    public function userLogin(Request $request)
    {
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required'
            ],
                [
                    'email.required' => (trans('validation.field_required')),
                    'email.email' => (trans('validation.field_email')),
                    'email.exists' => (trans('validation.These credentials do not match our data.')),
                    'password.required' => (trans('validation.field_required_password')),
                ]);

            $user = User::where('email', $request->email)->first();

            if ($user) {
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('home');
                }
            }
        }

            $request->validate([
                'email' => 'required|exists:users,phone',
                'password' => 'required'
            ],
                [
                    'email.required' => (trans('validation.field_required')),
                    'email.email' => (trans('validation.field_email')),
                    'email.exists' => (trans('validation.These credentials do not match our data.')),
                    'password.required' => (trans('validation.field_required_password')),
                ]);

            $user = User::where('phone', $request->email)->first();

            if ($user) {
                if (Auth::guard('web')->attempt(['phone' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('home');
                }
            }

        return redirect()->route('login');

    }
}
