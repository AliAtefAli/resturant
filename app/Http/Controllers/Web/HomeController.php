<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Slider;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::where('status', 'active')->get();
        $subscriptions = Subscription::with('translations')->get();
        $categories = Category::whereNull('category_id')->with('translations', 'categories', 'products')->get();
        $rates = Rate::all();
        $products  = Product::with('images')->limit(10)->get();
        $featured_products = Product::whereFeatured(1)->get();

        return view('web.home_page', compact('sliders', 'subscriptions', 'categories', 'rates', 'featured_products', 'products'));
    }

    public function change_language() {
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
        if(is_numeric($request->get('email'))){
            $user = User::where('phone', $request->get('email'))->first();
            $code = mt_rand(1111,9999);
            $user->update(['code' => $code]);
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->get('email'))->first();
            $code = mt_rand(1111,9999);
            $user->update(['code' => $code]);
        }
    }
}
