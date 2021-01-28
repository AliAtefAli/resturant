<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['discount_type', 'status', 'amount', 'code', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function checkCoupon($request)
    {
        $coupon = Discount::where('code', $request->coupon)->first();
        if (!$coupon) {
            return back()->with('error', trans('site.Order.Coupon not found'));
        }
        if ($coupon->status == 'available') {
            if ($coupon->discount_type == 'fixed') {
                $request['billing_total'] -= $coupon->amount;
            } else {
                $request['billing_total'] = $request['billing_total'] - ($request['billing_total'] * ($coupon->amount / 100));
            }
        } else {
            return back()->with('error', trans('site.Order.Coupon not Available'));
        }
    }
}
