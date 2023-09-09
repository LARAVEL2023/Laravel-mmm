<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index(){

        $postCount = Post::count();
        // dd( $postCount);
       return view('master.master', compact('postCount'));
    }
}
