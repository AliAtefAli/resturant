<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    use Uploadable;
    public function index()
    {
        $users = User::where('type', 'user')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('dashboard.users.index', compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');

    }


    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['phone'] = $this->clean($request->phone);
        if ($request->has('image')) {
            $data['image'] = $this->uploadOne($request->image, 'users', null, null);
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.It was done successfully!'));

    }

    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->all();
        $data['phone'] = $this->clean($data['phone']);
        if ($request->has('image')) {
            if (file_exists(public_path('assets/uploads/users/' . $user->image) && is_file(public_path('assets/uploads/users/' . $user->image)))) {
                unlink(public_path('assets/uploads/users/' . $user->image));
            }
            $data['image'] = $this->uploadOne($request->image, 'users', null, null);
        }
        $user->update($data);

        return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.It was done successfully!'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')->with("success", trans('dashboard.It was done successfully!'));

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
