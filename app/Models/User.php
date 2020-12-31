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
        'code', 'status', 'last_active_at'
    ];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class);
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
}
