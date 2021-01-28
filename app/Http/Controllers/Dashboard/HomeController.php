<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();

        return view('dashboard.index', compact('users', 'products', 'orders'));
    }

    public function change_language() {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
    }

}
