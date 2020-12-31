<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Subscription;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use Uploadable;
    public function index()
    {
        $subscriptions = Subscription::latest()->paginate(25);
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('dashboard.subscriptions.create');
    }

    public function store(SubscriptionRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')){
            $path = $this->uploadOne($request['image'], 'subscriptions', null, null);
            $data['image'] = $path;
        }

        Subscription::create($data);

        return redirect()->route('subscription.index')->with('success', trans('dashboard.subscription.created successfully'));
    }

    public function show(Subscription $subscription)
    {
        dd($subscription);
    }

    public function edit(Subscription $subscription)
    {
        return view('dashboard.subscriptions.edit', compact('subscription'));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $data = $request->validated();

        if ($request->has('image')){
            if (public_path('assets/uploads/subscriptions/' . $subscription->image)) {
                unlink(public_path('assets/uploads/subscriptions/' . $subscription->image));
            }
            $path = $this->uploadOne($request['image'], 'subscriptions', null, null);
            $data['image'] = $path;
        }
        $subscription->update($data);

        return redirect()->route('subscription.index')->with('success', trans('dashboard.subscription.updated successfully'));

    }

    public function destroy(Subscription $subscription)
    {
        // check if no subscriptions
        $subscription->delete();

        return redirect()->route('subscription.index')->with('success', trans('dashboard.subscription.deleted successfully'));
    }
}
