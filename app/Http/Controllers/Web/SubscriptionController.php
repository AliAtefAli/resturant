<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveSubscriptionRequest;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\Transaction;
use Carbon\Carbon;

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
        $setting = Setting::all()->pluck('value', 'key');
        $subscription = Subscription::findOrFail($request->subscription_id);
        $daysToAdd = $subscription->duration_in_day;
        $start_date = $request->start_date;
        $date = Carbon::parse($start_date)->addDays($daysToAdd - 1)->toDateString();
        $request['end_date'] = $date;
        $request['billing_total'] = ($subscription->price * $request->people_count) + ($request->shipping_type == 'delivery' ? ($setting['delivery_price']) : 0);
        $request['user_id'] = auth()->user()->id;
        $currentSubscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('end_date', '>=', Carbon::today())
            ->where('user_id', auth()->user()->id)
            ->whereNull('stopped_at')
            ->get();
        $currentSubscriptionsWhenFinished = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('end_date', '>=', ($request['start_date']))
            ->where('user_id', auth()->user()->id)
            ->get();

        if ($currentSubscriptions->count() > 0) {
            if ($currentSubscriptionsWhenFinished->count() > 0) {
                return back()->with('error', trans('site.Sorry, You already have a subscription'));
            }
        }
        if ($request->payment_type == 'credit_card') {
            session()->forget('subscription');
            session()->put('subscription', $request->all());
            return view('web.subscriptions.payment-gosell', compact('request'));
        }
        return $this->store($request);

    }

    public function store(SaveSubscriptionRequest $request)
    {
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

        auth()->user()->subscriptions()->attach($request->subscription_id, $request->except('_token', 'payment_method', 'transaction_id'));

        return redirect()->route('user_subscriptions')->with('success', trans('site.Added successfully'));
    }

    public function offSubscription($id)
    {

        $subscription = SubscriptionUser::findOrFail($id);
        if(Carbon::parse($subscription->end_date) == Carbon::today()) {
            return back()->with('error', trans('site.Sorry, the subscription cannot be suspended because this subscription will expire today'));
        }
        $subscription->update(['stopped_at' => Carbon::tomorrow()]);

        return back()->with('success', trans('site.The subscription has been successfully suspended'));
    }

    public function onSubscription($id)
    {
        $subscription = SubscriptionUser::findOrFail($id);
        $startDate = today();
        $endDate = Carbon::parse($subscription->end_date);
        $stoppedDate = Carbon::parse($subscription->stopped_at);
        $diffDays = $stoppedDate->diffInDays($endDate);
        $newEndDate = $startDate->addDays($diffDays)->toDateString();

        $subscription->update([
            'start_date' => today(),
            'end_date' => $newEndDate,
            'stopped_at' => null
        ]);

        return back()->with('success', trans('site.The subscription has been successfully restarted'));
    }

    public function redirect()
    {
        return view('web.subscriptions.redirect');
    }
}
