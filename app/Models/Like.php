<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'lkd', 'post_id', 'user_id',
    ];

    protected $dates = ['liked_at',];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
