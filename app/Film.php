<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Film extends Model
{
    use Commentable;

    protected $fillable = ['title', 'image1', 'image2', 'image3', 'desc', 'release', 'duration','comments', 'rating', 'trailer'];

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
