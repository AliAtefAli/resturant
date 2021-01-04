<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::where('type', 'user')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('dashboard.admins.index', compact('users'));
    }


    public function create()
    {
        return view('dashboard.admins.single');

    }


    public function store(StoreUserRequest $request)
    {
        dd($request->all());
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index', ['lang' => app()->getLocale()])->with("success",
            trans('dashboard.It was done successfully!'));

    }

    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(EditUserRequest $request, User $user)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        return redirect()->route('users.index', ['lang' => app()->getLocale()])->with("success",
            trans('dashboard.It was done successfully!'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');

    }

    public function block( User $user)
    {
        $user->update(['block' => !$user->block]);

        return response()->json('it is done');
    }
}
