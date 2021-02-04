<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('images', 'translations')
            ->where('quantity', '>', 0)
            ->paginate(10);

        return view('web.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        if ($product->quantity < 1) {
            return redirect()->route('home')->with('error', trans('site.Order.Sorry, this Quantity is not available'));
        }
        $related_products = Product::with('translations', 'images')
            ->where('category_id', $product->category->id)
            ->where('quantity', '>', 0)
            ->limit(5)
            ->orWhere('featured', 1)
            ->get();

        return view('web.products.show', compact('product', 'related_products'));
    }



}
