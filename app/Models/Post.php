<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'content', 'picture', 'festival_id', 'user_id',
    ];

    protected $dates = ['created_at', 'updated_on',];

    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    public function festival(){
        return $this->belongsTo(Festival::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function votedUsers(){
        return $this->belongsToMany(User::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }
}
