<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['discount_type', 'status', 'amount', 'code', 'start_date', 'end_date'];
    protected $dates = ['start_date', 'end_date'];

    public static function checkCoupon($request)
    {
        $coupon = Discount::where('code', $request->coupon)->first();
        if (!$coupon) {
            return back()->with('error', trans('site.Order.Coupon not found'));
        }
        if ($coupon->status == 'available') {
            if ($coupon->end_date < today()) {
                return back()->with('error', trans('site.Discount period expired'));
            }
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
