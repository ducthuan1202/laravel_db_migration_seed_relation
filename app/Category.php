<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'id', 'category_id');
    }

    # lấy sub categories đệ quy
    public function childrenCategories(){
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('childrenCategories');
    }

    # lấy parent categories đệ quy
    public function parentCategories()
    {
        return $this->hasMany(Category::class, 'id', 'parent_id')->with('parentCategories');
    }
}
