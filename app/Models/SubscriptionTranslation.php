<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
