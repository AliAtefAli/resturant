<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('images', 'translations')->paginate(10);

        return view('web.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $related_products = Product::with('translations', 'images')
            ->where('category_id', $product->category->id)
            ->limit(5)
            ->orWhere('featured', 1)
            ->get();

        return view('web.products.show', compact('product', 'related_products'));
    }

    public function activeCoupon()
    {

    }


}
