<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['username', 'profile_pic', 'rating', 'comment', 'posted_at', 'film_id'];

    public function film() {
        return $this->belongsTo('App\Film');
    }
}
