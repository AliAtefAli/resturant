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


}
