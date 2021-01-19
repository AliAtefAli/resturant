<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {

        $orders = auth()->user()->orders;

        $featured_products = Product::whereFeatured(1)->get();

        return view('web.orders.index', compact('orders', 'featured_products'));
    }
    public function store(StoreCheckoutRequest $request)
    {
        Product::checkProductQuantity();

        $order = Order::insertOrderDetails($request->all());

        Order::notifyNewOrder($order);

        Cart::destroy();

        return redirect()->route('home')->with('success', trans('dashboard.order.Your order is in progress'));
    }


}
