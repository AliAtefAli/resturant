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
        $categories = Category::with('categories.translations', 'translations', 'products');
        $products = Product::paginate(10);

        return view('web.products.index', compact('categories','products'));
    }

    public function show(Product $product)
    {
        $related_products = Product::where('category_id', $product->category->id)
            ->limit(5)
            ->orWhere('featured', 1)
            ->get();

        return view('web.products.show', compact('product', 'related_products'));
    }

    public function addToCart(Request $request, Product $product)
    {
        if ($request->qty > $product->quantity) {
            return back()->with('error', trans('site.Order.Please, this Quantity is not available'));
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => ($product->images->first()->path) ?? '']
        ])->associate(Product::class);

        return back()->with('success', trans('site.Added to cart successfully'));
    }

    public function removeFromCart($row)
    {
        if (!Cart::remove($row)) {
            return back()->with('success', trans('site.Deleted from cart successfully'));
        }
        else {
            return back()->with('error', trans('site.Sorry, Did not Deleted from cart successfully'));
        }
    }

    public function activeCoupon()
    {

    }


}
