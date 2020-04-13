<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profileImage(){
        return ($this->image) ? '/storage/' . $this->image : '/images/NIA.png';
    }
}
