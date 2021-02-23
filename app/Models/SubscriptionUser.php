<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubscriptionUser extends Model
{
    use Notifiable;
    protected $table = 'subscription_user';
    protected $fillable = ['start_date','end_date', 'validation_start_date','validation_end_date','shipping_type', 'billing_address', 'billing_phone', 'lat',
        'lng', 'people_count', 'payment_method', 'note', 'admin_notes' , 'subscription_id', 'user_id', 'stopped_at',
        'coupon_amount', 'coupon_type','status','stopped_count'
    ];


    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
