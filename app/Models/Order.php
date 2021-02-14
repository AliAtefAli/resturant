<?php

namespace App\Models;

use App\Notifications\NewOrderNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_address', 'billing_phone', 'billing_email', 'billing_name',
        'billing_total', 'payment_method', 'payment_status', 'order_status', 'lat', 'lng', 'coupon_amount', 'coupon_type'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity','product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function insertOrderDetails($request)
    {
        $request['user_id'] = auth()->user()->id;

        $order = Order::create($request);

        foreach (Cart::content() as $cart) {
            //decrease product quantity
            $product = Product::findOrfail($cart->model->id);
            $product->quantity -= $cart->qty;
            $product->save();
            $order->products()->attach($product, ['quantity' => $cart->qty]);
        }

        return $order;
    }

    public static function notifyNewOrder($order)
    {
        $admins = User::where('type', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($order));
        }
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, "transactionable");
    }
}
