<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OurMeals;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $our_meals = OurMeals::limit(10)->latest()->get();

        return view('web.carts.index', compact('our_meals'));
    }

    public function changeLiked(Request $request)
    {
        $store = Stores::find($request['id']);
        if ($store->liked == 'true') {
            $store->liked = 'false';
            if ($store->parent_id == 0) {
                $store->branches()->update(['liked' => 'false']);
            }
        } else {
            $store->liked = 'true';
            if ($store->parent_id == 0) {
                $store->branches()->update(['liked' => 'true']);
            }
        }
        $store->update();
        return response()->json($store->liked);

    }

    public function addToCart(Request $request, Product $product)
    {
        $id = $product->id;
        $rows = Cart::instance('cart')->content();

        if ($rows->where('id', $id)->first()) {
            $qty = $rows->where('id', $id)->first()->qty;
            if (($request->qty + $qty) > $product->quantity) {
                return response()->json([
                    'status' => false,
                    'message' => trans('site.Order.Sorry, this Quantity is not available'),
                    'quantity' => Cart::count()
                ]);
            } else {
                Cart::instance('cart')->add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $request->qty,
                    'price' => $product->price,
                    'weight' => 0,
                    'options' => ['image' => ($product->images->first()->path) ?? '']
                ])->associate(Product::class);
                return response()->json([
                    'status' => true,
                    'message' => trans('site.Added to cart successfully'),
                    'quantity' => Cart::count()
                ]);
            }
        } else {
            if ($request->qty > $product->quantity) {
                return response()->json([
                    'status' => false,
                    'message' => trans('site.Order.Sorry, this Quantity is not available'),
                    'quantity' => Cart::count()
                ]);
            } else {
                Cart::instance('cart')->add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $request->qty,
                    'price' => $product->price,
                    'weight' => 0,
                    'options' => ['image' => ($product->images->first()->path) ?? '']
                ])->associate(Product::class);
                return response()->json([
                    'status' => true,
                    'message' => trans('site.Added to cart successfully'),
                    'quantity' => Cart::count()
                ]);
            }
        }
    }

    public function removeFromCart($row)
    {
        if (!Cart::instance('cart')->remove($row)) {
            return back()->with('success', trans('site.Deleted from cart successfully'));
        } else {
            return back()->with('error', trans('site.Sorry, Did not Deleted from cart successfully'));
        }
    }

}
