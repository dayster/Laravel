<?php

namespace App;
use App\Post;


class Comment extends Model
{
    public function post(){
    	return $this->belongsTo(Post::class);
    }
}
