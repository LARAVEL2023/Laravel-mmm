<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function store(Request $request ){
        
        $user = User::create($request->all());

        dd (URL::current());
        $request->session()->put('user', $user);
        (session('user'));
        $request->session()->flash('alert-success', 'Record has been Registered Successfully');
        return redirect('createpost');
    }


public function storepost(Request $request){
    $post = Post::create($request->all());
    (session('user'));
   $sid=  Session::get('user')['id'];
   dd($post);
    $post->user_id=$sid;

    $request->session()->flash('alert-success', 'Record has been Registered Successfully');
    return redirect('create');
}



}
