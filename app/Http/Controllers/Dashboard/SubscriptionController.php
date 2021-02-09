<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Product;
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
        $products = Product::all();
        return view('dashboard.subscriptions.create', compact('products'));
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')){
            $path = $this->uploadOne($request['image'], 'subscriptions', null, null);
            $data['image'] = $path;
        }
        $subscription = Subscription::create($data);
        $subscription->products()->attach($request->input('products'));

        return redirect()->route('dashboard.subscriptions.index')->with('success', trans('dashboard.subscription.created successfully'));
    }

    public function show(Subscription $subscription)
    {
        $subscription->load('products.translations', 'translations', 'users');

        return view('dashboard.subscriptions.show', compact('subscription'));
    }

    public function edit(Subscription $subscription)
    {
        $products = Product::all();
        $subscription_products = $subscription->products->pluck('id')->toArray();

        return view('dashboard.subscriptions.edit', compact('subscription', 'products', 'subscription_products'));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $subscription_products = $subscription->products->pluck('id')->toArray();
        Subscription::detachProducts($subscription, $request->input('products'), $subscription_products);
        $subscription->products()->attach($request->input('products'));

        $data = $request->validated();

        if ($request->has('image')){
            if (public_path('assets/uploads/subscriptions/' . $subscription->image)) {
                unlink(public_path('assets/uploads/subscriptions/' . $subscription->image));
            }
            $path = $this->uploadOne($request['image'], 'subscriptions', null, null);
            $data['image'] = $path;
        }
        $subscription->update($data);

        return redirect()->route('dashboard.subscriptions.index')->with('success', trans('dashboard.subscription.updated successfully'));

    }

    public function destroy(Subscription $subscription)
    {
        // check if no subscriptions
        if ($subscription->users->count() > 1) {
            return back()->with('error', trans('dashboard.subscriptions.Sorry you can not delete this Subscription'));
        }
        $subscription->delete();

        return redirect()->route('subscription.index')->with('success', trans('dashboard.subscription.deleted successfully'));
    }

    public function users(Subscription $subscription)
    {
        $users = $subscription->users;

        return view('dashboard.subscriptions.users', compact('users', 'subscription'));
    }
}
