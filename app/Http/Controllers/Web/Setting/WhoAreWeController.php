<?php

namespace App\Http\Controllers\Web\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhoAreWeController extends Controller
{

    public function index()
    {
        return view('web.settings.who_are_we');
    }


}
