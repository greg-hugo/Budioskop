<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'rating', 'comment', 'film_id'];

    public function film() {
        return $this->belongsTo('App\Film');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
