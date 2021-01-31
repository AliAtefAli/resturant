<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\NewsLetter;
use App\Models\User;
use Illuminate\Http\Request;
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
        if (is_numeric($request->get('email'))) {
            $user = User::where('phone', $request->get('email'))->first();
            if (!$user) {
                return back()->with('error', trans('site.User not found'));
            }
            $code = mt_rand(1111, 9999);
            $user->update(['code' => $code]);
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->get('email'))->first();
            if (!$user) {
                return back()->with('error', trans('site.User not found'));
            }
            $code = mt_rand(1111, 9999);
            $user->update(['code' => $code]);
        }

        return redirect()->route('code_confirm', $user);
    }

    public function codePage(User $user)
    {
        return view('auth.passwords.code', compact('user'));
    }

    public function codeConfirm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'code' => 'required'
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
            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success', trans('site.Password Changed Successfully'));
        } else {
            return back()->with('error', trans('site.Wrong Password, please try again'));
        }
    }
}
