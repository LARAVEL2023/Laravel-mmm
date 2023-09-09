<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamp = "false";
    protected $fillable = ['image', 'type'];
    public  const Type = 1;
    public $uploads = 'public/assets/images';


    

    public function cruds()
    {
        return $this->belongsTo('App\Crud');
    }
}
