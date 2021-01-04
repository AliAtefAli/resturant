<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use Translatable;
    public $translatedAttributes = ['name', 'description', 'about', 'policies', 'currency'];
    protected $fillable = ['logo', 'email', 'default_language', 'perPage', 'total_rate', 'count_rate', 'phone'];

}
