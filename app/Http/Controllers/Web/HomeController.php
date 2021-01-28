<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Slider;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::where('status', 'active')->get();
        $subscriptions = Subscription::with('translations')->get();
        $categories = Category::whereNull('category_id')
            ->with('translations', 'categories','categories.translations','products','categories.products.translations', 'categories.products.images')
            ->get();
        $rates = Rate::with('user')->limit(10)->get();
        $products = Product::with('images', 'translations')->limit(10)->get();
        $featured_products = Product::with('images')->whereFeatured(1)->limit(10)->get();

        return view('web.home', compact('sliders', 'subscriptions', 'categories', 'rates', 'featured_products', 'products'));
    }

    public function change_language()
    {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
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
        ],[
            'email.required' => (trans('validation.field_required_email')),
            'email.unique' => (trans('validation.field_exists_email'))
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        NewsLetter::create($request->all());

        return back()->with('success', trans('site.Added successfully'));
    }

}
