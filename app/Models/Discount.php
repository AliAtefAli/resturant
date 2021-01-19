<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['discount_type', 'status', 'amount', 'code', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
