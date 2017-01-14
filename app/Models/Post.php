<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {
    	return $this->belongsTo('App\Models\Category');
    }

    public function tags() {
    	return $this->belongsToMany('App\Models\Tag');
    }

    public function comments() {
    	return $this->hasMany('App\Models\Comment');
    }
}
