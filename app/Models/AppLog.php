<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppLog extends Model
{
    protected $fillable = ['action', 'message', 'meta'];
    
    protected $casts = [
        'meta' => 'array',
    ];
}
