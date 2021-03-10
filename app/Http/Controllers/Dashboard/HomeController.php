<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\SubscriptionUserExport;
use App\Http\Controllers\Controller;
use App\Mail\SubsEnd;
use App\Mail\TodaySubs;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubscriptionUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'user')->get()->count();
        $admins = User::where('type', 'admin')->get()->count();
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


    public function export()
    {
        return Excel::download(new SubscriptionUserExport, 'اشتراكات الغد.xlsx');
    }


//    public function subsEnd()
//    {
//
//        $subscriptions = SubscriptionUser::with('subscription')
//            ->where('end_date', '<', Carbon::today())
//            ->whereNull('stopped_at')
//            ->get();
//
//        $data = [];
//
//        foreach ($subscriptions as $subscription)
//        {
//            $data = [
//                'id' => $subscription->id,
//                'user_name' => $subscription->user->name,
//                'subscribe_name' => $subscription->subscription->name,
//                'end_date' => Carbon::parse($subscription->end_date)->toDateString()
//            ];
//        }
//
//        Mail::to("ahmadwaliedzyada@gmail.com")->
//        send(new SubsEnd($data));
//
//        return back()->with('success','Success');
//    }


}
