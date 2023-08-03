<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
   
   public function show(){
     
     $images = Image::all();
     return view('show', compact('images'));

   }
   
   
   
    public function create_image()
    {
        return view('image');
    }
    
    public function store_image(Request $request)
    {
        $images = new Image;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time(). "vs.".$extenstion;
            $file->move('uploads/images',$filename);
            $images->image = $filename;

        }
      
       $sid=  Session::get('crud')['id'];
        $images->crud_id=$sid;
        
        $images->save();
       return redirect('crud');
    }


}
