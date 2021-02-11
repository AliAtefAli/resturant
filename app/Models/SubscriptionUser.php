<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionUser extends Model
{
    protected $table = 'subscription_user';
    protected $fillable = ['start_date','end_date', 'type', 'address', 'phone_number', 'latitude',
        'longitude', 'count', 'payment_method', 'note', 'subscription_id', 'user_id', 'stopped_at'];


    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
