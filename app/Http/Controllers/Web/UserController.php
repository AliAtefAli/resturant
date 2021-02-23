<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Favorite;
use App\Models\OurMeals;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Traits\Uploadable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Uploadable;

    public function index()
    {
        $our_meals = OurMeals::limit(10)->latest()->get();

        return view('web.users.index', compact('our_meals'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if ($request->has('image')) {
            if (file_exists(public_path('assets/uploads/users/' . $user->image) && is_file(public_path('assets/uploads/users/' . $user->image)))) {
                unlink(public_path('assets/uploads/users/' . $user->image));
            }
            $data['image'] = $this->uploadOne($request->image, 'users', null, null);
        }
        $data['phone'] = $this->clean($data['phone']);
        $user->update($data);

        return back()->with("success", trans('dashboard.Updated successfully!'));
    }

    private function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    public function fav()
    {
        $favorites = Favorite::where('user_id', auth()->user()->id)
            ->with('product')
            ->get();

        return view('web.fav.index', compact('favorites'));

    }

    public function makeFav($id)
    {
        $user_favorites = auth()->user()->favorites->pluck('product_id')->toArray();
        if (in_array($id, $user_favorites)) {
            $product = Favorite::where('product_id', $id);
            $product->delete();
            return back()->with('success',trans('site.It has been deleted to the favorites'));
        }

        Favorite::create([
            'product_id' => $id,
            'user_id' => (auth()->user()->id) ?? ''
        ]);
        return back()->with('success',trans('site.It has been added to the favorites'));
    }

    public function subscriptions()
    {
        $subscribed_packages = SubscriptionUser::with('subscription', 'subscription.products')
//        ->where('start_date', '<=', Carbon::today())
            ->where('user_id', auth()->user()->id)
            ->where('end_date', '>=', Carbon::today())
            // ->orWhere('stopped_at', null)
            // ->whereNull('stopped_at')
            ->get();

        $finished_subscribed_packages = SubscriptionUser::with('subscription', 'subscription.products')
            ->where('end_date', '<', Carbon::today())
            ->where('user_id', auth()->user()->id)
            ->get();
        $our_meals = OurMeals::limit(10)->latest()->get();

//        $s = SubscriptionUser::where('start_date', '<=', Carbon::today())
//            ->where('user_id', auth()->user()->id)
//            ->get();
        // dd($subscribed_packages, $finished_subscribed_packages);
        return view('web.users.subscriptions', compact('subscribed_packages', 'finished_subscribed_packages', 'our_meals'));
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications->where('type', '!=', 'App\Notifications\NewOrderNotification');
        $notifications->markAsRead();

        return view('web.users.notifications', compact('notifications'));
    }


}
