<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'user')->get()->count();
        $admins = User::where('type', 'admin')->get()->count();
        // $admins = User::all()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();
        $new_orders = Order::whereDate('created_at', '>=' , Carbon::today())->count();

        return view('dashboard.index', compact('users', 'products', 'orders','new_orders', 'admins'));
    }

    public function change_language() {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
    }

}
