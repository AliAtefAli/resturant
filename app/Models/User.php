<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'phone_verified_at', 'phone', 'country_key', 'type',
        'code', 'status', 'last_active_at', 'image', 'lat', 'lng', 'address'
    ];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];
    protected $dates = ['last_active_at'];

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class)
            ->withPivot('start_date', 'end_date', 'people_count', 'billing_total', 'shipping_type',
                'billing_address', 'payment_type',  'billing_phone', 'note', 'id')
            ->orderBy('start_date', 'desc');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function rate()
    {
        return $this->hasOne(Rate::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
