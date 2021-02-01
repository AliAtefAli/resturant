<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = auth()->user()->orders->load('products', 'products.translations');

        $featured_products = Product::with('images')
            ->whereFeatured(1)->get();

        return view('web.orders.index', compact('orders', 'featured_products'));
    }

    public function checkPayment(StoreCheckoutRequest $request)
    {
        if (Product::checkProductQuantity()) {
            return back()->with('error', trans('site.Order.Sorry, this Quantity is not available'));
        }
        $request['billing_total'] = $this->getBillingTotal();
        $request['user_id'] = auth()->user()->id;

        if ($request->payment_method == 'payment') {
            session()->forget('billing');
            session()->put('billing', $request->all());
            return view('web.carts.payment-gosell', compact('request'));
        }
        return $this->store($request);

    }
    public function store(StoreCheckoutRequest $request)
    {
        $request['billing_total'] = $this->getBillingTotal();
        if ($request->has('coupon')) {
            Discount::checkCoupon($request);
        }
        $order = Order::insertOrderDetails($request->all());

        if ($request->payment_method == 'payment') {
            Transaction::create([
                'transactionable_type' => Order::class,
                'transactionable_id' => $order->id,
                'transaction_id' => $request->transaction_id,
                'user_id' => auth()->user()->id,
                'payment_method' => $request->payment_type,
                'amount' => $request['billing_total']
            ]);
        }

        Order::notifyNewOrder($order);

        Cart::instance('cart')->destroy();

        return redirect()->route('home')->with('success', trans('dashboard.order.Your order is in progress'));
    }

    private function getBillingTotal()
    {
        $setting = Setting::all()->pluck('value', 'key');
        // remove the delimiter
        $total = explode(',', Cart::instance('cart')->total());
        $billing_total = implode('', $total);
        $billing_total = $billing_total + (floatval($setting['delivery_price'])) ?? 0;

        return $billing_total;
    }
}
