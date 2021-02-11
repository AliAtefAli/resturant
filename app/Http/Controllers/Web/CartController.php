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
            ->whereFeatured(1)
            ->where('quantity', '>', 0)
            ->get();

        return view('web.carts.index', compact('featured_products'));
    }

    public function redirect()
    {
        return view('web.carts.redirect');
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

        if ($request->qty > $product->quantity) {
            return response()->json([
                'status' => false,
                'message' => trans('site.Order.Sorry, this Quantity is not available'),
                'quantity' => Cart::count()
            ]);
        } else {
            if (Cart::instance('cart')->count() == 0) {
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
            } else {
                if ($rows->where('id', $id)->first()) {
                    $rowId = $rows->where('id', $id)->first()->rowId;
                    Cart::instance('cart')->update($rowId, [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => $request->qty,
                        'price' => $product->price,
                        'weight' => 0,
                        'options' => ['image' => ($product->images->first()->path) ?? '']
                    ])->associate(Product::class);
                    return response()->json([
                        'status' => true,
                        'message' => trans('site.Updated to cart successfully'),
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
