<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function show(Subscription $subscription)
    {
        // $subscription = Subscription::findOrFail($id);
        $other_subscriptions = Subscription::where('id', '!=', $subscription->id)->get();
        // dd($subscription, $other_subscriptions);
        return view('web.subscriptions.index', compact('subscription', 'other_subscriptions'));
    }

    public function submit($id, Request $request)
    {
        $subscription = Subscription::findOrFail($id);
        $count = $request->count;
        return view('web.subscriptions.index_2', compact('subscription', 'count'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:local,global',
            'payment_method' => 'required|in:credit_card,on_delivery',
            'subscription_id' => 'required|exists:subscriptions,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
        ]);


        $subscription = Subscription::findOrFail($request->subscription_id);
        $data = $request->all();

        $daysToAdd = $subscription->duration_in_day;
        $start_date = $request->start_date;
        $date = Carbon::parse($start_date)->addDays($daysToAdd)->toDateString();

        auth()->user()->subscriptions()->attach($subscription, [
            'start_date' => $request->start_date,
            'end_date' => $date,
            'type' => $request->type,
            'payment_method' => $request->payment_method,
            'address' => ($request->address)?? null,
            'phone_number' => ($request->phone_number)?? null ,
            'latitude' => ($request->lat)?? null,
            'longitude' => ($request->lng)?? null,
            'count' => $request->count,
            'note' => ($request->note)?? null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('user_subscriptions');
    }
}
