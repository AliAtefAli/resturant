<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Translatable;
    protected $fillable = ['category_id'];
    public $translatedAttributes = ['name'];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
