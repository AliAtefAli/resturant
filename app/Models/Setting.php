<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use Translatable;
    public $translatedAttributes = [];
    protected $fillable = ['logo', 'email', 'default_lan', 'perPage'];

}
