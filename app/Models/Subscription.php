<?php

namespace App\Models;

use App\Models\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = ['duration_in_day', 'price', 'image'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('count');
    }

    protected static function detachProducts($subscription, $productRequests, $subscriptionProducts)
    {
        foreach ($subscriptionProducts as $product) {
            $products = Product::where('id', $product)->get();
            $subscription->products()->detach($products);
        }
    }
}
