<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function change_language() {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
    }

    public function home()
    {

        return view('dashboard.layouts.app');

    }// end of home


    public function create()
    {

        return view('dashboard.admins.single');

    }// end of home


    public function show()
    {

        return view('dashboard.admins.show');

    }// end of home


    public function new()
    {

        return view('new');

    }// end of home

    public function table()
    {

        return view('table');

    }
}
