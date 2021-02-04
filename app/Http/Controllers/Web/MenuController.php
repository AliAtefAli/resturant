<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $featured_products = Product::with('images')
            ->where('quantity', '>', 0)
            ->whereFeatured(1)->get();

        return view('web.menus.index',compact('featured_products'));
    }


}
