<?php

namespace App\Http\Controllers;



use App\Crud;
use App\Roll;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index(Request $request)
    {
        
        
     $post = Post::first();
    return $post->tags;



        $search = $request['search'] ?? "";
        if($search != null){
           
            //$cruds = Crud::withTrashed()->get();
         $cruds = Crud::withTrashed()->where('email', 'like', '%'.$search.'%')
                      ->orwhere('name', 'like', '%'.$search.'%')->paginate(2);
        }
        else{
            $cruds = Crud::withTrashed()->paginate(2);
           // dd($cruds);
           
        }


        
        return view('crud.index', compact('cruds'));

        
        // $cruds = Crud::where([
        //     ['name', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($search = $request->search)) {
        //             $query->orWhere('name', 'LIKE', '%' . $search . '%')
        //                 ->orWhere('email', 'LIKE', '%' . $search . '%')
        //                 ->get();
        //         }
        //     }]
        // ])->paginate(3);
        //return view('crud.index', compact('cruds'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image()
    {

       
        return view('crud.image');
    }


    public function create(Request $request)
    {

        $rolls = Roll::all();
        //dd($roll);
        
        
        return view('crud.create', compact('rolls'));
    }








    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud=Crud::create($request->all());
        
        // $filename = time(). "vs.".$request->file('image')->getClientOriginalExtension();
        //  $file= $request->file('image')->storeAs('uploads',$filename);
        
       $request->session()->put('crud', $crud); 
       (session('crud'));
       
       //<p>{{Session::get('user')['city']}}</p>
        $request->session()->flash('alert-success', $crud->name.'!'.' '. 'Record has been saved');
        
        return redirect('image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        $crud = Crud::with('rolls','images')->find($crud->id);
        //dd($crud);
        //$image = Image::with('cruds')->get();
        //dd($image);
        return view('crud.show',  compact('crud'), compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud)
    {
        $crud = Crud::find($crud->id);

        //dd($crud);
        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud)
    {
        $crud->update($request->all());
        $request->session()->flash('update', $crud->name.'!'. 'Your Profile has been updated');
        return redirect('crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
       
        $crud->destroy($crud->id);
        Session::flash('delete', $crud->name.'!'. 'Your Profile has been Deleted');
        return redirect('crud');
    }
   
     
    
    
}
