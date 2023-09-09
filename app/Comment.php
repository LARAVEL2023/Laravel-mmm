<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'message' ];

    public function crud()
    {
        return $this->belongsTo(Crud::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
 


}
