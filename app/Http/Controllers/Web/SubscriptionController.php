<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRateRequest;
use App\Http\Requests\SaveSubscriptionRequest;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\Transaction;
use Carbon\Carbon;
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
        $setting = Setting::all()->pluck('value', 'key');
        $subscription = Subscription::findOrFail($request->subscription_id);

//        $membership = SubscriptionUser::where('user_id',$request['user_id'])->exists();

        $userSubs = SubscriptionUser::where('user_id',auth()->user()->id)
            ->where(function ($q) use($request)
            {
                $q->where('start_date', '<=' ,Carbon::now());
                $q->where('end_date', '>=' ,Carbon::now());
            }
            )->get();

//        dd($userSubs);

        if (!empty($userSubs)) {
            if ($request->start_date <= $userSubs->end_date) {
                return back()->with('error', 'لديك اشتراك بالفعل');
            }
        }

        $daysToAdd = $subscription->duration_in_day;
        $start_date = $request->start_date;
        $date = Carbon::parse($start_date)->addDays($daysToAdd)->toDateString();
        $request['end_date'] = $date;
        $request['billing_total'] = ($subscription->price * $request->people_count) + ($request->shipping_type == 'delivery' ? ($setting['delivery_price']) : 0);
        $request['user_id'] = auth()->user()->id;


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

    public function redirect()
    {
        return view('web.subscriptions.redirect');
    }
}
