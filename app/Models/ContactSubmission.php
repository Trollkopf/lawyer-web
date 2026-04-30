<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'accepted_privacy_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'accepted_privacy_at' => 'datetime',
    ];
}
