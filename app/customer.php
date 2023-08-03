<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\post;

class customer extends Model
{
    public function posts(){
        return $this->hasMany(post::class)->where('title', 'pcm');
    }
}
