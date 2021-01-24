<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::with('translations', 'categories','categories.translations')
        ->whereNull('category_id')->get();

        return view('web.categories.index',compact('categories'));
    }

    public function categoryIndex($id)
    {
        $category = Category::with('products', 'products.images', 'products.translations')->where('id',$id)->first();
        $super = Category::where('id' , $category->category_id)->first();

        return view('web.categories.show',compact('category','super'));
    }
}
