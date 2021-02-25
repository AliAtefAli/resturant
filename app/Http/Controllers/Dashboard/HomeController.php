<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubscriptionUser;
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
        $subscriptions = SubscriptionUser::all()->count();
        $today_subscriptions = SubscriptionUser::whereDate('start_date', Carbon::today())->count();
        $tomorrow_subscriptions = SubscriptionUser::whereDate('start_date', Carbon::tomorrow())->count();

        return view('dashboard.index', compact('users', 'products', 'subscriptions','today_subscriptions', 'admins','tomorrow_subscriptions'));
    }

    public function change_language() {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
    }

}
