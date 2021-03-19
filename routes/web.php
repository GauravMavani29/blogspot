<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
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

// Route::get('/', function () {
//     return "okay it's working fine";
// });

Route::get('/admin/login',[AdminController::class, 'login']);
Route::post('/admin/login',[AdminController::class, 'submit_login']);
Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
//category
Route::resource('admin/category', CategoryController::class);
Route::get('/admin/category/{id}/delete',[CategoryController::class, 'destroy']);
//post  
Route::get('/admin/post/{id}/delete',[PostController::class, 'destroy']);
Route::resource('admin/post', PostController::class);

//comments
Route::get('/admin/comments',[AdminController::class, 'comments']);
Route::get('/admin/comments/delete/{id}',[AdminController::class, 'delete_comment']);

//users
Route::get('/admin/users',[AdminController::class, 'users']);
Route::get('/admin/users/delete/{id}',[AdminController::class, 'delete_user']);

//logout
Route::get('/admin/logout',function(){
    session()->forget(['adminData']);
    return redirect('admin/login');
});

Route::get('admin/setting',[SettingController::class,'index']);
Route::post('admin/setting',[SettingController::class,'save_setting']);

//Frontend
Route::get('/',[HomeController::class, 'index']);
Route::get('/frontend/post/addpost',[HomeController::class, 'addpost']);
Route::get('/frontend/managepost',[HomeController::class, 'managepost']);
Route::get('/frontend/post/editpost/{id}',[HomeController::class, 'editpost']);
Route::put('/frontend/post/updatepost/{id}',[HomeController::class, 'updatepost']);


Route::post('/frontend/savepost',[HomeController::class, 'savepost']);
Route::get('/frontend/blog',[HomeController::class, 'blog']);
Route::get('/frontend/category-blog/{id}',[HomeController::class, 'category_blog']);
Route::get('/frontend/post',[HomeController::class, 'post']);
Route::get('/frontend/post/{id}',[HomeController::class, 'postmain']);
Route::post('save-comment/{id}',[HomeController::class,'save']);
Route::get('/testing',function()
{
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

