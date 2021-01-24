<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $featured_products = Product::with('images')
        ->whereFeatured(1)->get();

        return view('web.carts.index', compact('featured_products'));
    }

    public function addToCart(Request $request, Product $product)
    {
        if ($request->qty > $product->quantity) {
            return back()->with('error', trans('site.Order.Please, this Quantity is not available'));
        }


        Cart::instance('cart')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => ($product->images->first()->path) ?? '']
        ])->associate(Product::class);

        return response()->json(['success' => trans('site.Added to cart successfully'), 'quantity' => Cart::instance('cart')->count()]);
    }

    public function removeFromCart($row)
    {
        if (!Cart::instance('cart')->remove($row)) {
            return back()->with('success', trans('site.Deleted from cart successfully'));
        }
        else {
            return back()->with('error', trans('site.Sorry, Did not Deleted from cart successfully'));
        }
    }

}
