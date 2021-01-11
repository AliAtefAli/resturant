<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Slider;
use App\Models\Subscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::where('status', 'active')->get();
        $subscriptions = Subscription::with('translations')->get();
        $categories = Category::with('translations', 'categories', 'products')->get();
        $rates = Rate::all();
        $featured_products = Product::where('featured', true)->get();

        return view('web.home_page', compact('sliders', 'subscriptions', 'categories', 'rates', 'featured_products'));
    }

    public function change_language() {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
    }
}
