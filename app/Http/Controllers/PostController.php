<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Crud;
use App\Comment;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function store_post(Request $request, $id){
        
        $posts = new Post;
        $posts->post = $request->post;
        $posts->crud_id = $id;
        $posts->save();
        $msg = "Record has been Recover successfully!";
        return redirect('crud');
    }


    public function store_comment(Request $request, $id){
        

   $comment = new Comment;
   $comment->message = $request->input('message');
   $comment->post_id = $id;
   
   //dd(session('$crud', 'name'));
    Session('crud');
    $cid = Session('crud.id');
    dd($cid);
   $comment->crud_id = $cid;
   
   $comment->save();








    //     // insert data with dynamic data passing by select
    //     //dd($request->all());
    //     $comment = new Comment([
    //      'message' => $request->input('message'),
    //     ]);
    //     $crud = Crud::find($request->input('crud_id'));
    //     $post = Post::find($request->input('post_id'));
    //     $comment->crud()->associate($crud);
    //     $comment->post()->associate($post);
    //    //dd($comment);
    //     // Save the comment
    //     $comment->save();
        $msg = "Record has been Recover successfully!";
        return redirect('crud');
    }



    public function show(){

        $posts = Post::with('cruds')->get();;
        $cruds = Crud::all();
       //dd ($posts);
       return view ('post', compact('posts') , compact('cruds'));
    }
   
   
    public function send_message(Request $request, $id  ){
         //dd($id);
         $comment = new Comment;
         $comment->message = $request->message;
         $comment->post_id = $id;
         //dd($comment);
         $comment->save();
         $msg = "Comment has been saved successfully!";
         return redirect('post');
    }
    public function show_comment(){

        $comments = Comment::with('post','crud')->get();
        
        //dd($comments);
        return view ('comment', compact('comments'));
    }



}
