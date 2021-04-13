<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['title', 'image1', 'image2', 'image3', 'desc', 'release', 'duration', 'trailer'];

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
