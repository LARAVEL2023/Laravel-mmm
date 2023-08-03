<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class SoftDeleteController extends Controller
{
    //
    public function softdelete($id)
    {
         
      $crud = Crud::onlyTrashed()->find($id);
    
       $crud->update([
        'deleted_at' => null
       ]);
         
        return redirect ('crud');
    }
    
}
