<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['name', 'email', 'message_subject', 'answer', 'replied_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
