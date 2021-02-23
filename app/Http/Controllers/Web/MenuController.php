<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OurMeals;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $our_meals = OurMeals::limit(10)->latest()->get();

        return view('web.menus.index',compact('our_meals'));
    }


}
