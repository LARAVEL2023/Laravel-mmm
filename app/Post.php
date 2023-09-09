<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['post', 'crud_id'];


    public function crud()
{
    return $this->belongsTo(Crud::class);
}
    public function cruds(){
      return $this->belongsTo(Crud::class, 'crud_id');
    }
    

public function comments()
{
    return $this->hasMany(Comment::class);
}


  public function tags(){
    return $this->morphToMany('App\Tag', 'taggable');
  }

}
