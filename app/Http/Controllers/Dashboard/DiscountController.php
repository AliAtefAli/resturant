<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('dashboard.discounts.index', compact('discounts'));
    }

    public function create()
    {
        $products = Product::all();

        return view('dashboard.discounts.create', compact('products'));
    }

    public function store(StoreDiscountRequest $request)
    {
        Discount::create($request->validated());

        return redirect()->route('dashboard.discounts.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Discount $discount)
    {
        $products = Product::all();

        return view('dashboard.discounts.edit', compact('products', 'discount'));
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());

        return redirect()->route('dashboard.discounts.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('dashboard.discounts.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function makeAsUnavailable(Discount $discount)
    {
        $discount->update(['status' => 'unavailable'] );

        return redirect()->route('dashboard.discounts.index')->with("success", trans('dashboard.slider.updated successfully'));
    }
    public function makeAsAvailable(Discount $discount)
    {
        $discount->update(['status' => 'available'] );

        return redirect()->route('dashboard.discounts.index')->with("success", trans('dashboard.slider.updated successfully'));
    }
}
