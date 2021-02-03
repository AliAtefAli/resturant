<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();

        return view('dashboard.rates.index', compact('rates'));
    }

    public function off(Rate $rate)
    {
        $rate->update(['status' => 'off']);

        return redirect()->route('dashboard.rates.index')->with("success", trans('dashboard.It was done successfully!'));
    }

    public function on(Rate $rate)
    {
        $rate->update(['status' => 'on']);

        return redirect()->route('dashboard.rates.index')->with("success", trans('dashboard.It was done successfully!'));
    }
}
