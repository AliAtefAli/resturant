<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
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
}
