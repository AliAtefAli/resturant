<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function create()
    {
        $social = Social::first();

        return view('dashboard.socials.single', compact('social'));
    }
    public function store(StoreSocialRequest $request)
    {
        $social = Social::first();
        if (!$social) {
            Social::Create($request->validated());
        } else {
            $social->update($request->validated());
        }

        return back();
    }
}
