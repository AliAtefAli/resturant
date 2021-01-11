<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSubscriptionController extends Controller
{

    public function index()
    {
        return view('web.user_subscriptions.index');
    }


}
