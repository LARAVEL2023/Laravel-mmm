<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 


class Crud extends Model
{
    use  SoftDeletes;
    
  protected $softDelete = true;
    protected $fillable = ['roll_id','name', 'number', 'email', 'password','deleted_at' ];

    public function rolls()
    {
        return $this->belongsTo('App\Roll', 'roll_id');
    }
    public function images()
    {
        return $this->hasMany('App\Image', 'crud_id');
    }

   
}
