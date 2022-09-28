<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['pivot'];
    
    public function posts(){
        return $this->belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id');
    }
}

