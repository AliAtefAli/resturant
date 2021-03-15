<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Discount;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Traits\Uploadable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    use Uploadable;

    public function index()
    {
        $users = User::whereType('user')->orderBy('created_at', 'DESC')->get();

        return view('dashboard.users.users', compact('users'));
    }

    public function admins()
    {

        $admins = User::whereType('admin')->orderBy('created_at', 'DESC')->get();

        return view('dashboard.users.admins', compact('admins'));
    }


    public function create()
    {
        return view('dashboard.users.create');

    }


    public function store(Request $request)
    {
        $request['phone'] = editPhone($request['phone']);

        $request->validate([
            'phone' => ['required', 'unique:users', 'string', 'phone:SA'],
            "name" => "required|string|min:3|max:141",
            'email'=>'required|email|unique:users',
            'type'=>'required',
            'status'=>'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation'=>'sometimes|required_with:password',
            'image' => 'image|mimes:jpg,jpeg,svg,png',
            'address' => 'required',
            'permissions' => 'required|in:chef,delivery,admin'
        ],
            [
                'phone.required' => (trans('validation.field_required_phone')),
                'phone.unique' => (trans('validation.field_exists_phone')),
                'phone.phone' => (trans('validation.Please Enter Correct saudi arabia phone')),
                'name.required' => (trans('validation.field_required_name')),
                'name.min' => (trans('validation.field_min_3')),
                'email.required' => (trans('validation.field_required_email')),
                'email.email' => (trans('validation.field_email')),
                'email.unique' => (trans('validation.field_exists_email')),
                'type.required' => (trans('validation.field_required_type')),
                'status.required' => (trans('validation.field_required_status')),
                'password.required' => (trans('validation.field_required_password')),
                'password.min' =>(trans('validation.field_min_8')),
                'password.confirmed' => (trans('validation.password_confirmed')),
                'image.image' => (trans('validation.field_image')),
                'address.required' => (trans('validation.field_required_address')),
//                'permissions.required' => (trans('validation.field_required_address')),
            ]
        );


        $data = $request->all();
        $data['phone'] = editPhone($data['phone']);
        if ($request->has('image')) {
            $data['image'] = $this->uploadOne($request->image, 'users', null, null);
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        if ($request->type == 'user') {
            return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.created_successfully'));
        }
        return redirect()->route('dashboard.users.admins')->with("success", trans('dashboard.created_successfully'));
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request['phone'] = editPhone($request['phone']);

        $request->validate([
            'phone' => ['required', 'string', 'phone:SA' , Rule::unique('users')->ignore($user->id, 'id')],
            "name" => "required|string|min:3|max:141",
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id, 'id')],
            'type'=>'required',
            'status'=>'required',
            'image' => 'image|mimes:jpg,jpeg,svg,png',
            'address' => 'required',
            'permissions' => 'required|in:chef,delivery,admin'
        ],
            [
                'name.required' => (trans('validation.field_required_name')),
                'email.required' => (trans('validation.field_required_email')),
                'email.email' => (trans('validation.field_email')),
                'phone.phone' => __('validation.Please Enter Correct saudi arabia phone'),
                'password.confirmed' => (trans('validation.password_confirmed')),
            ]
        );

        $data = $request->all();
        $data['phone'] = editPhone($request['phone']);
        if ($request->has('image')) {
            if (file_exists(public_path('assets/uploads/users/' . $user->image))) {
                @unlink(public_path('assets/uploads/users/' . $user->image));
            }
            $data['image'] = $this->uploadOne($request->image, 'users', null, null);
        }
        $user->update($data);

        if ($request->type == 'user') {
            return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.Updated successfully!'));
        }
        return redirect()->route('dashboard.users.admins')->with("success", trans('dashboard.Updated successfully!'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.deleted_successfully'));

    }

    public function block(User $user)
    {
        $user->update(['status' => 'block']);

        return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.It was done successfully!'));
    }

    public function unBlock(User $user)
    {
        $user->update(['status' => 'active']);

        return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.It was done successfully!'));
    }

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    private function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    public function selectSubscribe(User $user)
    {
        $subscriptions = Subscription::all();

        return view('dashboard.users.select_subscribe', compact('subscriptions','user'));
    }

//    public function subscribe(Request $request)
//    {
//        return $this->userSubscribe($request);
//    }

    public function userSubscribe(User $user,Subscription $subscription)
    {
        return view('dashboard.users.subscribe',compact('user','subscription'));
    }

    public function storeSubscribe(Request $request)
    {
        $request->validate([
                'shipping_type' => 'required',
                'subscribe_id' => 'required',
                'start_date' => 'required',
        ],
            [

            ]
        );

        $subscribe = Subscription::find($request->subscribe_id);
        $user = User::find($request->user_id);

        $daysToAdd = $subscribe->duration_in_day;
        $start_date = $request->start_date;
        $end_date = Carbon::parse($start_date)->addDays($daysToAdd - 1)->toDateString();
        $validation_start_date = Carbon::parse($end_date)->addDays(1)->toDateString();
        $validation_end_date = Carbon::parse($validation_start_date)->addDays($daysToAdd - 1)->toDateString();

        if ($request->shipping_type == 'local' )
        {
            if ($request->coupon == null)
            {
                $total_billing = $subscribe->price * $request->people_count;

                SubscriptionUser::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'validation_start_date' => $validation_start_date,
                    'validation_end_date' => $validation_end_date,
                    'shipping_type' => $request->shipping_type,
                    'billing_total' => $total_billing,
                    'billing_phone' => ($request->billing_phone)??null,
                    'billing_address' => $request->billing_address,
                    'lat' => ($request->lat)??$user->lat,
                    'lng' => ($request->lng)??$user->lng,
                    'people_count' => $request->people_count,
                    'payment_type' => $request->payment_type,
                    'note' => ($request->note)??null,
                    'subscription_id' => $subscribe->id,
                    'stopped_count' => ($subscribe->count)??null,
                    'user_id' => $user->id,
                ]);
                return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.It was done successfully!'));
            }else
            {
                $total_billing = $request->total_billing;
                $coupon = Discount::where('code', $request->coupon)->first();
                SubscriptionUser::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'validation_start_date' => $validation_start_date,
                    'validation_end_date' => $validation_end_date,
                    'shipping_type' => $request->shipping_type,
                    'billing_total' => $total_billing,
                    'billing_phone' => ($request->billing_phone)??null,
                    'billing_address' => $request->billing_address,
                    'lat' => ($request->lat)??$user->lat,
                    'lng' => ($request->lng)??$user->lng,
                    'people_count' => $request->ppl_count,
                    'payment_type' => $request->payment_type,
                    'note' => ($request->note)??null,
                    'subscription_id' => $subscribe->id,
                    'coupon_amount' => $coupon->amount,
                    'coupon_type' => $coupon->discount_type,
                    'stopped_count' => $subscribe->count,
                    'user_id' => $user->id,
                ]);
                return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.It was done successfully!'));
            }
        }else
        {
            if ($request->coupon == null)
            {
                $total_billing = $subscribe->price * $request->people_count + $subscribe->delivery_price;
                SubscriptionUser::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'validation_start_date' => $validation_start_date,
                    'validation_end_date' => $validation_end_date,
                    'shipping_type' => $request->shipping_type,
                    'billing_total' => $total_billing,
                    'billing_phone' => ($request->billing_phone)??null,
                    'billing_address' => $request->billing_address,
                    'lat' => ($request->lat)??$user->lat,
                    'lng' => ($request->lng)??$user->lng,
                    'people_count' => $request->people_count,
                    'payment_type' => $request->payment_type,
                    'note' => ($request->note)??null,
                    'subscription_id' => $subscribe->id,
                    'stopped_count' => $subscribe->count,
                    'user_id' => $user->id,
                ]);
                return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.It was done successfully!'));
            }else
            {
                $total_billing = $request->total_billing;
                $coupon = Discount::where('code', $request->coupon)->first();
                SubscriptionUser::create([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'validation_start_date' => $validation_start_date,
                    'validation_end_date' => $validation_end_date,
                    'shipping_type' => $request->shipping_type,
                    'billing_total' => $total_billing,
                    'billing_phone' => ($request->billing_phone)??null,
                    'billing_address' => $request->billing_address,
                    'lat' => ($request->lat)??$user->lat,
                    'lng' => ($request->lng)??$user->lng,
                    'people_count' => $request->ppl_count,
                    'payment_type' => $request->payment_type,
                    'note' => ($request->note)??null,
                    'subscription_id' => $subscribe->id,
                    'coupon_amount' => $coupon->amount,
                    'coupon_type' => $coupon->discount_type,
                    'stopped_count' => $subscribe->count,
                    'user_id' => $user->id,
                ]);
                return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.It was done successfully!'));
            }
        }
    }

    public function checkCoupon(Request $request)
    {

        if ($request->ajax()) {
            $coupon = Discount::where('code', $request->coupon)->first();
            $subscription = Subscription::find($request->subscription);
            if ($request->shipping_type == 'delivery'){
                $total = ($subscription->price * $request->people_count) + $subscription->delivery_price;
                if (!$coupon) {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Order.Coupon not found')
                        ]
                    );
                }
                $request['coupon'] = $coupon;
                if ($coupon->status == 'available') {
                    if ($coupon->end_date < today() || $coupon->start_date > today()) {
                        return response()->json([
                                'status' => false,
                                'msg' => trans('site.Discount period expired'),
                            ]
                        );
                    }
                    if ($coupon->start_date > today()) {
                        return response()->json([
                                'status' => false,
                                'msg' => trans('site.Discount period expired'),
                            ]
                        );
                    }
                    if ($coupon->discount_type == 'fixed') {

                        $request['totalBefore'] = $total;
                        $request['billing_total'] = $total - $coupon->amount;
                    } else {
                        $request['totalBefore'] = $total;
                        $request['billing_total'] = $total - $total * ($coupon->amount / 100);
                    }
                } else {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Order.Coupon not Available')
                        ]
                    );
                }
            }else{
                $total = ($subscription->price * $request->people_count);
                if (!$coupon) {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Order.Coupon not found')
                        ]
                    );
                }
                $request['coupon'] = $coupon;
                if ($coupon->status == 'available') {
                    if ($coupon->end_date < today() || $coupon->start_date > today()) {
                        return response()->json([
                                'status' => false,
                                'msg' => trans('site.Discount period expired'),
                            ]
                        );
                    }
                    if ($coupon->start_date > today()) {
                        return response()->json([
                                'status' => false,
                                'msg' => trans('site.Discount period expired'),
                            ]
                        );
                    }
                    if ($coupon->discount_type == 'fixed') {

                        $request['totalBefore'] = $total;
                        $request['billing_total'] = $total - $coupon->amount;
                    } else {
                        $request['totalBefore'] = $total;
                        $request['billing_total'] = $total - $total * ($coupon->amount / 100);
                    }
                } else {
                    return response()->json([
                            'status' => false,
                            'msg' => trans('site.Order.Coupon not Available')
                        ]
                    );
                }
            }

        } else {
            return response()->json([
                    'status' => false,
                    'msg' => trans('site.Order.Enter Your coupon')
                ]
            );
        }
        return response()->json([
                'status' => true,
                'msg' => trans('site.Discount is successfully'),
                'data' => $request->all()
            ]
        );

    }

    public function activeSubs(User $user)
    {
        $subscriptions = SubscriptionUser::with('subscription')
            ->where('user_id', $user->id)
            ->where('end_date','>', Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        return view('dashboard.users.active_sub', compact('subscriptions','user'));
    }

    public function stoppedSubs(User $user)
    {
        $subscriptions = SubscriptionUser::with('subscription')
            ->where('user_id', $user->id)
            ->where('end_date','>', Carbon::today())
            ->whereNotNull('stopped_at')
            ->get();

        return view('dashboard.users.stopped_subs', compact('subscriptions','user'));
    }


    public function finishedSubs(User $user)
    {
        $subscriptions = SubscriptionUser::with('subscription')
            ->where('user_id', $user->id)
            ->where('end_date', '<',  Carbon::today())
            ->whereNull('stopped_at')
            ->get();

        return view('dashboard.users.finished_subs', compact('subscriptions','user'));
    }



}
