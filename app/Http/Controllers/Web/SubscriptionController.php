<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function index()
    {
        return view('web.subscriptions.index');
    }

    public function submit()
    {
        return view('web.subscriptions.index_2');
    }



}
