<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class SearchController extends Controller
{
    function search(Request $request){

        $cruds = Crud::all();
    
        return view('search', compact('cruds'));
    }

    
}
