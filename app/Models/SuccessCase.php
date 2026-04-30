<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessCase extends Model
{
    protected $fillable = [
        'title',
        'challenge',
        'approach',
        'outcome',
        'practice_area',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
