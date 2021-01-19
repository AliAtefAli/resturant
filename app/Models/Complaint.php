<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'message_subject', 'user_id', 'answer', 'replied_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
