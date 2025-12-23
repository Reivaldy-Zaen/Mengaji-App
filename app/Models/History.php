<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'reading_histories';

    protected $fillable = [
        'user_id',
        'surah_number',
        'last_ayat',
        'is_complete',
        'last_read_at',
    ];

    protected $casts = [
        'last_read_at' => 'datetime',
        'is_complete' => 'boolean',
    ];
}
