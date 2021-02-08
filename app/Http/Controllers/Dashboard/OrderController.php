<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use App\Notifications\AcceptOrder;
use App\Notifications\DeliveredOrder;
use App\Notifications\RejectOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer as Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('dashboard.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
//        $setting = Setting::first();
//
//        return view('dashboard.orders.show', compact('order', 'setting'));

    }

    public function ordersOfToday()
    {
        $orders = Order::whereDate('created_at', '>=' , Carbon::today())
            ->get();

        return view('dashboard.orders.today', compact('orders'));
    }

    public function accepted(Order $order)
    {
        $order->update(['order_status' => 'accepted']);
        $user = $order->user;
        $from = Setting::where('key', 'email')->get('value')->first()->value;
        $message = 'Order Is Successfully Accepted And We are preparing it';

        $user->notify(new AcceptOrder($message, $from));
        return back()->with('success', trans('dashboard.It was done successfully!'));

    }

    public function delivered(Order $order)
    {
        $order->update(['order_status' => 'delivered']);
        $user = $order->user;
        $from = Setting::where('key', 'email')->get('value')->first()->value;
        $message = 'Order Is Successfully Processed And Your Order Is On The Way';

        $user->notify(new DeliveredOrder($message, $from));
        return back()->with('success', trans('dashboard.It was done successfully!'));

    }
    public function rejected(Order $order)
    {
        $order->update(['order_status' => 'cancelled']);
        $user = $order->user;
        $from = Setting::where('key', 'email')->get('value')->first()->value;
        $message = 'Sorry Order Is unSuccessfully Processed';

        $user->notify(new RejectOrder($message, $from));
        return back()->with('success', trans('dashboard.It was done successfully!'));

    }
}
