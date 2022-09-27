<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'id', 'category_id');
    }
}
