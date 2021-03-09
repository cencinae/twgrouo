<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
