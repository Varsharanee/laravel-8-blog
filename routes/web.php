<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [homeController::class,'index']);

Route::get('/admin/dashboard',[AdminController::class,'index']);

//All route for Category table
Route::get('/category/index',[CategoryController::class,'index']);
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category/create',[CategoryController::class,'store']);
Route::get('/category/show/{id}',[CategoryController::class,'show']);
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update',[CategoryController::class,'update']);
Route::get('/category/destroy/{id}',[CategoryController::class,'destroy']);

//All route for Post table
Route::get('/post/index',[PostController::class,'index']);
Route::get('/post/create',[PostController::class,'create']);
Route::post('/post/create',[PostController::class,'store']);
Route::get('/post/show/{id}',[PostController::class,'show']);
Route::get('/post/edit/{id}',[PostController::class,'edit']);
Route::post('/post/update',[PostController::class,'update']);
Route::get('/post/destroy/{id}',[PostController::class,'destroy']);

//All route for Comment table
Route::get('/comment/index',[CommentController::class,'index']);
Route::get('/comment/show/{id}',[CommentController::class,'show']);
Route::get('/comment/destroy/{id}',[CommentController::class,'destroy']);

//All route for setting
Route::get('/admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting',[SettingController::class,'saveSetting']);

//All route for frontend 
Route::get('/index',[homeController::class,'index']);
Route::get('/about',[homeController::class,'about']);
Route::get('/contact',[homeController::class,'contact']);
Route::get('/post/{slug}/{id}',[homeController::class,'post']);
Route::post('/save-comment/{slug}/{id}',[homeController::class,'save_comment']);

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [homeController::class,'index'])->name('dashboard');

});

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});