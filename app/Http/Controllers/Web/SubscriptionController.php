<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveSubscriptionRequest;
use App\Models\Discount;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\Transaction;
use App\Notifications\TodaySubscriptions;
use App\Notifications\FinishedSubscriptions;
use App\Notifications\NewSubscriptions;
use App\Notifications\StoppedSubscriptions;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function show(Subscription $subscription)
    {
        $other_subscriptions = Subscription::where('id', '!=', $subscription->id)->get();

        return view('web.subscriptions.index', compact('subscription', 'other_subscriptions'));
    }

    public function create(Subscription $subscription)
    {
        return view('web.subscriptions.create', compact('subscription'));
    }

    public function checkPayment(SaveSubscriptionRequest $request)
    {

        $subscription = Subscription::findOrFail($request->subscription_id);
        if ($request->coupon != null) {
            $coupon = Discount::where('code', $request->coupon)->first();
            $request['coupon_amount'] = $coupon->amount;
            $request['coupon_type'] = $coupon->discount_type;
        }

        $daysToAdd = $subscription->duration_in_day;
        $start_date = $request->start_date;
        $date = Carbon::parse($start_date)->addDays($daysToAdd - 1)->toDateString();
        $request['end_date'] = $date;
        if ($request->shipping_type == 'delivery')
        {
            $request['billing_total'] = ($subscription->price * $request->people_count) + $subscription->delivery_price;

        }else
            {
                $request['billing_total'] = ($subscription->price * $request->people_count);

            }
        $request['user_id'] = auth()->user()->id;

        $validation_start_date = Carbon::parse($date)->addDays(1)->toDateString();

        $validation_end_date = Carbon::parse($validation_start_date)->addDays($daysToAdd - 1)->toDateString();

        $request['validation_start_date'] = $validation_start_date;
        $request['validation_end_date'] = $validation_end_date;


        if ($request->payment_type == 'credit_card') {
            session()->forget('subscription');
            session()->put('subscription', $request->all());
            return view('web.subscriptions.payment-gosell', compact('request'));
        }
        return $this->store($request);

    }

    public function store(SaveSubscriptionRequest $request)
    {

        if ($request->coupon != null) {
            if ($request->total_billing != null)
            $request['billing_total'] = $request->total_billing;
        }
        if ($request->payment_type == 'credit_card') {
            Transaction::create([
                'transactionable_type' => 'Subscription',
                'transactionable_id' => $request->subscription_id,
                'transaction_id' => $request->transaction_id,
                'user_id' => auth()->user()->id,
                'payment_method' => $request->payment_method,
                'amount' => $request['billing_total']
            ]);
        }
        $subscription = Subscription::find($request->subscription_id);

        $request['created_at'] = Carbon::parse(today());
        $request['updated_at'] = Carbon::parse(today());
        $request['stopped_count'] = $subscription->count;

        auth()->user()->subscriptions()->attach($request->subscription_id, $request->except('_token', 'payment_method', 'transaction_id', 'coupon', 'subs_id', 'total_billing'));

        $admins = User::where('type', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewSubscriptions('the_request_has_been_sent_successfully_waiting_for_a_response'));
        }

        return redirect()->route('user_subscriptions')->with('success', trans('site.Added successfully'));
    }

    public function checkCoupon(Request $request)
    {

        if ($request->ajax()) {
            $coupon = Discount::where('code', $request->coupon)->first();
            $subscription = Subscription::find($request->subscription);
//            $total = ($subscription->price * $request->people_count) + $subscription->delivery_price;
            if ($request->shipping_type == 'delivery'){
                $total = ($subscription->price * $request->people_count) + $subscription->delivery_price;
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

        } else {
            return response()->json([
                    'status' => false,
                    'msg' => trans('site.Order.Enter Your coupon')
                ]
            );
        }
        return response()->json([
                'status' => true,
                'msg' => trans('site.Discount is successfully'),
                'data' => $request->all()
            ]
        );

    }

    public function offSubscription($id)
    {

        $subscription = SubscriptionUser::findOrFail($id);

        if(Carbon::parse($subscription->end_date) == Carbon::today()) {
            return back()->with('error', trans('site.Sorry, the subscription cannot be suspended because this subscription will expire today'));
        }


        if ($subscription->stopped_count == null || $subscription->stopped_count == 0)
        {
            return back()->with('error', trans('dashboard.sorry_the_available_times_to_activate_the_subscription_have_expired'));
        }

        if ($subscription->end_date > Carbon::today()) {

            $subscription->update(
                [
                    'stopped_at' => Carbon::tomorrow(),
                    'stopped_count' => $subscription->stopped_count - 1,
                    'updated_at' => Carbon::today()->toDateString()
                ]
            );

            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new StoppedSubscriptions('Stop Subscription'));
            }
            return back()->with('success', trans('site.The subscription has been successfully suspended'));
        }

    }


    public function onSubscription($id)
    {
        $subscription = SubscriptionUser::findOrFail($id);
        $startDate = Carbon::tomorrow();
        $end = Carbon::parse($subscription->end_date);
        $stoppedDate = Carbon::parse($subscription->start_date);
        $diffDays = $stoppedDate->diffInDays($end);
        $EndDate = $startDate->addDays($diffDays)->toDateString();

        if ($EndDate > $subscription->validation_end_date) {

            $newEndDate = $subscription->validation_end_date;

            $subscription->update([
                'start_date' => Carbon::tomorrow(),
                'end_date' => $newEndDate,
                'stopped_at' => null,
            ]);

            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new TodaySubscriptions('Active Subscription'));
            }

            return back()->with('success', trans('site.The subscription has been successfully restarted'));

        }else
        {

            $subscription->update([
                'start_date' => Carbon::tomorrow(),
                'end_date' => $EndDate,
                'stopped_at' => null,
            ]);

            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new TodaySubscriptions('Active Subscription'));
            }

            return back()->with('success', trans('site.The subscription has been successfully restarted'));

        }
    }

    public function redirect()
    {
        return view('web.subscriptions.redirect');
    }
}
