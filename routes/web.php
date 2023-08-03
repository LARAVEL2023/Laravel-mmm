<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SoftDeleteController;
use Illuminate\Support\Facades\Route;
use App\customer;
use App\Http\Controllers\UserController;
use App\post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('crud', CrudController::class); 
Route::get('softdelete/{id}',[SoftDeleteController::class,'softdelete'])->name('softdelete/{id}');


route::view('search',[SearchController::class,'search']);
route::get('search',[SearchController::class,'search']);
route::get('image',[ImageController::class,'create_image']);
route::post('store_image',[ImageController::class,'store_image']);
route::get('show',[ImageController::class,'show']);

Route::get('test', function(){
    $customer = customer::first();
    return $customer->posts;
});
Route::get('test1', function(){
    $post = post::first();
    return  $post->customer;
});


//--------------------------------------------------------------

Route::view('create', 'create');
Route::post('store', [UserController::class,'store']);
Route::view('createpost', 'createpost');
Route::post('storepost', [UserController::class,'storepost']);