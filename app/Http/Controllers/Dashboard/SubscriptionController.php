<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Notifications\AcceptSubscription;
use App\Notifications\TodaySubscriptions;
use App\Notifications\DeliveredSubscription;
use App\Notifications\RejectSubscription;
use App\Notifications\StoppedSubscriptions;
use App\Traits\Uploadable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

        return view('dashboard.subscriptions.edit', compact('subscription'));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $data = $request->all();

        if ($request->has('image')) {
            if (public_path('assets/uploads/subscriptions/' . $subscription->image) && is_file(public_path('assets/uploads/subscriptions/' . $subscription->image))) {
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
        if ($subscription->users->count() > 1) {
            return back()->with('error', trans('dashboard.subscriptions.Sorry you can not delete this Subscription'));
        }
        if (file_exists(public_path('assets/uploads/subscriptions/' . $subscription->image) && is_file(public_path('assets/uploads/subscriptions/' . $subscription->image))) ) {
            unlink(public_path('assets/uploads/subscriptions/' . $subscription->image));
        }
        $subscription->delete();

        return redirect()->route('dashboard.subscriptions.index')->with('success', trans('dashboard.deleted_successfully'));
    }

    public function users(Subscription $subscription)
    {
        $users = $subscription->users;

        return view('dashboard.subscriptions.users', compact('users', 'subscription'));
    }

    public function tomorrowSubscription()
    {
        if (auth()->user()->permissions == 'delivery') {
            $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
                ->where('start_date', '<=', Carbon::tomorrow())
                ->where('end_date', '>=', Carbon::today())
                ->where('shipping_type', 'delivery')
                ->whereNull('stopped_at');

            $subscriptions = $subscriptions->select("*", DB::raw("6371 * acos(cos(radians(" . lat() . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . lng() . "))
                                + sin(radians(" . lat() . ")) * sin(radians(lat))) AS distance"));
            $subscriptions = $subscriptions->having('distance', '<', 1000000);
            $subscriptions = $subscriptions->orderBy('distance', 'asc');
        } else {
            $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
                ->where('start_date', '<=', Carbon::tomorrow())
                ->where('end_date', '>=', Carbon::today())
                ->whereNull('stopped_at');
        }
        $subscriptions = $subscriptions->get();

        $notifications = auth()->user()->notifications->where('type', 'App\Notifications\TomorrowSubscriptions');
        $notifications->markAsRead();

        return view('dashboard.subscriptions.tomorrow', compact('subscriptions'));
    }

    public function todaySubscription()
    {
        if (auth()->user()->permissions == 'delivery') {
            $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
                ->where('start_date', '<=', Carbon::today())
                ->where('end_date', '>=', Carbon::today())
                ->where('shipping_type', 'delivery')
                ->whereNull('stopped_at');

            $subscriptions = $subscriptions->select("*", DB::raw("6371 * acos(cos(radians(" . lat() . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . lng() . "))
                                + sin(radians(" . lat() . ")) * sin(radians(lat))) AS distance"));

            $subscriptions = $subscriptions->having('distance', '<', 1000000);
            $subscriptions = $subscriptions->orderBy('distance', 'asc');
        } else {
            $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
                ->where('start_date', '<=', Carbon::today())
                ->where('end_date', '>=', Carbon::today())
                ->whereNull('stopped_at');
        }
        $subscriptions = $subscriptions->get();

        $notifications = auth()->user()->notifications->where('type', 'App\Notifications\TodaySubscriptions');
        $notifications->markAsRead();

        return view('dashboard.subscriptions.today', compact('subscriptions'));
    }

    public function allSubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
            ->where('end_date', '>', Carbon::today())
            ->whereNull('stopped_at');

        if (auth()->user()->permissions == 'chef') {
            $subscriptions = $subscriptions->select("*", DB::raw("6371 * acos(cos(radians(" . lat() . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . lng() . "))
                                + sin(radians(" . lat() . ")) * sin(radians(lat))) AS distance"));
            $subscriptions = $subscriptions->having('distance', '<', 1000000);
            $subscriptions = $subscriptions->orderBy('distance', 'asc');
        }
        $subscriptions = $subscriptions->get();

        $notifications = auth()->user()->notifications->where('type', 'App\Notifications\NewSubscriptions');
        $notifications->markAsRead();

        return view('dashboard.subscriptions.all', compact('subscriptions'));
    }

    public function showSubscription(SubscriptionUser $subscriptionUser)
    {
        return view('dashboard.subscriptions.show_subscription', compact('subscriptionUser'));
    }

    public function SubscriptionNote(Request $request, $id)
    {
        $subscriptionUser = SubscriptionUser::find($id);
        $subscriptionUser->update([
            'note' => $request->note
        ]);
        return back()->with('success', trans('site.Updated successfully'));
    }

    public function stoppedSubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
            ->where('end_date', '>', Carbon::today())
            ->whereNotNull('stopped_at');
        if (auth()->user()->permissions == 'chef') {
            $subscriptions = $subscriptions->select("*", DB::raw("6371 * acos(cos(radians(" . lat() . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . lng() . "))
                                + sin(radians(" . lat() . ")) * sin(radians(lat))) AS distance"));
            $subscriptions = $subscriptions->having('distance', '<', 1000000);
            $subscriptions = $subscriptions->orderBy('distance', 'asc');
        }
        $subscriptions = $subscriptions->get();

        $notifications = auth()->user()->notifications->where('type', 'App\Notifications\StoppedSubscriptions');
        $notifications->markAsRead();

        return view('dashboard.subscriptions.stopped', compact('subscriptions'));
    }

    public function finishedSubscription()
    {
        $subscriptions = SubscriptionUser::with('subscription', 'subscription.products', 'user')
            ->where('end_date', '<', Carbon::today())
            ->whereNull('stopped_at');
        if (auth()->user()->permissions == 'chef') {
            $subscriptions = $subscriptions->select("*", DB::raw("6371 * acos(cos(radians(" . lat() . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . lng() . "))
                                + sin(radians(" . lat() . ")) * sin(radians(lat))) AS distance"));
            $subscriptions = $subscriptions->having('distance', '<', 1000000);
            $subscriptions = $subscriptions->orderBy('distance', 'asc');
        }
        $subscriptions = $subscriptions->get();

        $notifications = auth()->user()->notifications->where('type', 'App\Notifications\FinishedSubscriptions');
        $notifications->markAsRead();

        return view('dashboard.subscriptions.finished', compact('subscriptions'));
    }


    public function accepted(SubscriptionUser $subscription)
    {
        $subscription->update(['status' => 'accepted']);
        $user = $subscription->user;
        $from = Setting::where('key', 'email')->get('value')->first()->value;
        $message = 'Order Is Successfully Accepted And We are preparing it';

        $user->notify(new AcceptSubscription($message, $from));
        return back()->with('success', trans('dashboard.It was done successfully!'));

    }

    public function delivered(SubscriptionUser $subscription)
    {
        $subscription->update(['status' => 'delivered']);
        $user = $subscription->user;
        $from = Setting::where('key', 'email')->get('value')->first()->value;
        $message = 'Order Is Successfully Processed And Your Order Is On The Way,';

        $user->notify(new DeliveredSubscription($message, $from));
        return back()->with('success', trans('dashboard.It was done successfully!'));

    }

    public function rejected($id)
    {
        $userSubscription = SubscriptionUser::findOrFail($id);
        $user = $userSubscription->user;
        $from = Setting::where('key', 'email')->get('value')->first()->value;
        $message = 'Sorry Order Is unSuccessfully Processed';
        $user->notify(new RejectSubscription($message, $from));
        $userSubscription->delete();
        return back()->with('success', trans('dashboard.It was done successfully!'));

    }


    public function offSubscription($id)
    {
        $subscription = SubscriptionUser::findOrFail($id);

        if (Carbon::parse($subscription->end_date) == Carbon::today()) {
            return back()->with('error', trans('site.Sorry, the subscription cannot be suspended because this subscription will expire today'));
        }

        if ($subscription->end_date > Carbon::today()) {

            $subscription->update(
                [
                    'stopped_at' => Carbon::tomorrow(),
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

        } else {

            $subscription->update([
                'start_date' => Carbon::tomorrow(),
                'end_date' => $EndDate,
                'stopped_at' => null,
            ]);


            return back()->with('success', trans('site.The subscription has been successfully restarted'));

        }
    }

    public function editSubs(Request $request, $id)
    {
        $subscription = SubscriptionUser::find($id);

        $subscription->update([
            'end_date' => $request->end_date
        ]);

        return back()->with('success', trans('dashboard.It was done successfully!'));
    }

    public function deleteSubs($id)
    {
        $subscribe = SubscriptionUser::find($id);

        $subscribe->delete();

        return back()->with('success', trans('dashboard.deleted_successfully'));
    }

}
