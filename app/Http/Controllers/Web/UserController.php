<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $featured_products = Product::whereFeatured(1)->get();

        return view('web.users.index', compact('featured_products'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $data['phone'] = $this->clean($data['phone']);
        $user->update($data);

        return back()->with("success", trans('dashboard.It was done successfully!'));
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
            return back();
        }

        Favorite::create([
            'product_id' => $id,
            'user_id' => (auth()->user()->id) ?? ''
        ]);
        return back();
    }

    public function subscriptions()
    {
        $subscribed_packages =  auth()->user()->subscriptions()
            ->where('start_date','<',Carbon::today())
            ->orWhere('end_date','>',Carbon::today())
            ->get();


        $finished_subscribed_packages =  auth()->user()->subscriptions()
            ->where('start_date','!<',Carbon::today())
            ->orWhere('end_date','!>',Carbon::today())
            ->get();

        return view('web.user_subscriptions.index', compact('subscribed_packages', 'finished_subscribed_packages'));
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications;
        $notifications->markAsRead();

        return view('web.notifications.index', compact('notifications'));
    }


}
