<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRateRequest;
use App\Http\Requests\SaveSubscriptionRequest;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
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
        return view('web.subscriptions.index_2', compact('subscription'));
    }

    public function store(SaveSubscriptionRequest $request)
    {
        $subscription = Subscription::findOrFail($request->subscription_id);
        $data = $request->except('_token');

        $daysToAdd = $subscription->duration_in_day;
        $start_date = $request->start_date;
        $date = Carbon::parse($start_date)->addDays($daysToAdd)->toDateString();
        $data['end_date'] = $date;


        auth()->user()->subscriptions()->attach($subscription, $data);

        return redirect()->route('user_subscriptions')->with('success', trans('site.Added successfully'));
    }
}
