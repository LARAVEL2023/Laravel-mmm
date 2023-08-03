<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamp = "false";


    public function cruds()
    {
        return $this->belongsTo('App\Crud');
    }
}
