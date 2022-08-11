<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'is_active',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_on' => 'datetime',
    ];
}
