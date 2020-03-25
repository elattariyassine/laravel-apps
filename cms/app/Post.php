<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'content', 'image', 'category_id'];
    use SoftDeletes;
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
