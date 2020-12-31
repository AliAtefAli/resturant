<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());

        if ($user) {
            session()->flash('success', 'User created successfully.');
            return redirect()->route('user.index');
        } else {
            session()->flash('error', 'Sorry, User doesn\'t created. please try again');
            return back();
        }

    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request,User $user)
    {
        $user->update($request->all());

        if ($user) {
            session()->flash('success', 'User Updated successfully.');
            return redirect()->route('user.index');
        } else {
            session()->flash('error', 'Sorry, User doesn\'t updated. please try again');
            return back();
        }

    }

    public function multi_delete(Request $request)
    {
//        dd($request->all());
        User::destroy($request->ids);

        session()->flash('success', 'Users Deleted Successfully');

        return back();
    }

}
