<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['price', 'category_id', 'quantity', 'featured'];

    public static function checkProductQuantity()
    {
        foreach (Cart::instance('cart')->content() as $cart) {
            if ($cart->qty > Product::find($cart->id)->quantity) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function discount()
    {
        return $this->hasMany(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
