<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['about', 'picture', 'twitter', 'facebook', 'user_id'];

    public function user(){
        $this->belongsTo(User::class);
    }
}
