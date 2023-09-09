<?php

namespace App;


use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Caste\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class Crud extends Model
{
    use  SoftDeletes;
    
  protected $softDelete = true;
    protected $fillable = ['roll_id','image_id','is_publish','name', 'number', 'email', 'password','deleted_at' ];

    public function rolls()
    {
        return $this->belongsTo('App\Roll', 'roll_id');
    }
    public function images()
    {
        return $this->hasMany('App\Image', 'crud_id');
    }
    public function image()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
     

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



     public function getEmailAttribute($value)
     {

         return ucfirst($value);
    //     return strtoupper($email);
    //     return strtolower($email);
       
    }
      
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

     public function getCreatedAtAttribute($value){

        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
     }

    public function scopePublish($value){

        $value->where('is_publish', 1);
    }
     
    
}
