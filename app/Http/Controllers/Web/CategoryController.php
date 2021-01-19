<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::whereNull('category_id')->get();

        return view('web.categories.index',compact('categories'));
    }

    public function categoryIndex($id)
    {
        $category = Category::where('id',$id)->first();
        $super = Category::where('id' , $category->category_id)->first();

        return view('web.categories.show',compact('category','super'));
    }
}
