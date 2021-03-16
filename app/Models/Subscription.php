<?php

namespace App\Models;

use App\Models\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'description','products'];

    protected $fillable = ['duration_in_day', 'price', 'image', 'delivery_price', 'count'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('start_date', 'end_date', 'people_count', 'billing_total',
                'shipping_type', 'billing_address', 'payment_type', 'billing_phone', 'note', 'id')
            ->orderBy('start_date', 'desc');
    }

    protected static function detachProducts($subscription, $productRequests, $subscriptionProducts)
    {
        foreach ($subscriptionProducts as $product) {
            $products = Product::where('id', $product)->get();
            $subscription->products()->detach($products);
        }
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, "transactionable");
    }

    public static function checkCoupon($request)
    {
        dd($request->all());
        $coupon = Discount::where('code', $request->coupon)->first();
        $subscription = Subscription::find($request->subscription);
        if (!$coupon) {
            return response()->json([
                    'status' => false,
                    'msg' => trans('site.Order.Coupon not found')
                ]
            );
        }
        if ($request->shipping_type == 'delivery'){
            $total = ($subscription->price * $request->people_count) + $subscription->delivery_price;
            $request['coupon'] = $coupon;
            if ($coupon->status == 'available') {
                if ($coupon->end_date < today() || $coupon->start_date > today()) {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Discount period expired'),
                        ]
                    );
                }
                if ($coupon->start_date > today()) {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Discount period expired'),
                        ]
                    );
                }
                if ($coupon->discount_type == 'fixed') {

                    $request['totalBefore'] = $total;
                    $request['billing_total'] = $total - $coupon->amount;
                } elseif($coupon->discount_type == 'free_delivery') {
                    $request['totalBefore'] = $total ;
                    $request['billing_total'] = $total - $subscription->delivery_price ;
                } else {
                    $request['totalBefore'] = $total;
                    $request['billing_total'] = $total - $total * ($coupon->amount / 100);
                }
            } else {
                return response()->json([
                        'status' => false,
                        'msg' => trans('site.Order.Coupon not Available')
                    ]
                );
            }
        }else{
            $total = $subscription->price * $request->people_count;
            if (!$coupon) {
                return response()->json([
                        'status' => false,
                        'msg' => trans('site.Order.Coupon not found')
                    ]
                );
            }
            $request['coupon'] = $coupon;
            if ($coupon->status == 'available') {
                if ($coupon->end_date < today() || $coupon->start_date > today()) {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Discount period expired'),
                        ]
                    );
                }
                if ($coupon->start_date > today()) {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Discount period expired'),
                        ]
                    );
                }
                if ($coupon->discount_type == 'fixed') {

                    $request['totalBefore'] = $total;
                    $request['billing_total'] = $total - $coupon->amount;
                } elseif($coupon->discount_type == 'free_delivery') {
                    $request['totalBefore'] = $total ;
                    $request['billing_total'] = $total;
                } else {
                    $request['totalBefore'] = $total;
                    $request['billing_total'] = $total - $total * ($coupon->amount / 100);
                }
            } else {
                return response()->json([
                        'status' => false,
                        'msg' => trans('site.Order.Coupon not Available')
                    ]
                );
            }
        }
    }
}
