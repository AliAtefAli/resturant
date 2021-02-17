<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Traits\Uploadable;
use Carbon\Carbon;

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

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'subscriptions', null, null);
            $data['image'] = $path;
        }
        $subscription = Subscription::create($data);
        $subscription->products()->attach($request->input('products'));

        return redirect()->route('dashboard.subscriptions.index')->with('success', trans('dashboard.created_successfully'));
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

        if ($request->has('image')) {
            if (public_path('assets/uploads/subscriptions/' . $subscription->image)) {
                unlink(public_path('assets/uploads/subscriptions/' . $subscription->image));
            }
            $path = $this->uploadOne($request['image'], 'subscriptions', null, null);
            $data['image'] = $path;
        }
        $subscription->update($data);

        return redirect()->route('dashboard.subscriptions.index')->with('success', trans('dashboard.Updated successfully!'));

    }

    public function destroy(Subscription $subscription)
    {
        // check if no subscriptions
        if ($subscription->users->count() > 1) {
            return back()->with('error', trans('dashboard.subscriptions.Sorry you can not delete this Subscription'));
        }
        $subscription->delete();

        return redirect()->route('dashboard.subscriptions.index')->with('success', trans('dashboard.deleted_successfully'));
    }

    public function users(Subscription $subscription)
    {
        $users = $subscription->users;

        return view('dashboard.subscriptions.users', compact('users', 'subscription'));
    }

    public function todaySubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('start_date', '<=', Carbon::today())
            ->where('end_date', '>=',  Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        return view('dashboard.subscriptions.today', compact('subscriptions'));
    }

    public function stoppedSubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->whereNotNull('stopped_at')
            ->get();

        return view('dashboard.subscriptions.stopped', compact('subscriptions'));
    }

    public function finishedSubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('end_date', '<',  Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        return view('dashboard.subscriptions.finished', compact('subscriptions'));
    }

    public function allSubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products')
            ->latest()->get();

        return view('dashboard.subscriptions.all', compact('subscriptions'));
    }
}
