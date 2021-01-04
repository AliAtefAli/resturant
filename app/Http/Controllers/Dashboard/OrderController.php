<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()
            ->paginate(25);

        return view('dashboard.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $setting = Setting::first();

        return view('dashboard.orders.show', compact('order', 'setting'));


    }
}
