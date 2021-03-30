<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserpostController;
use App\Http\Controllers\UserprofileController;
use App\Http\Controllers\SubscriptionController;
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
Route::get('/admin/category/allpost/{id}',[CategoryController::class, 'allpost']);


//post  
Route::get('/admin/post/{id}/delete',[PostController::class, 'destroy']);
Route::resource('admin/post', PostController::class);

//comments
Route::get('/admin/comments',[AdminController::class, 'comments']);
Route::get('/admin/comments/delete/{id}',[AdminController::class, 'delete_comment']);
Route::get('/admin/post/comments/{id}',[AdminController::class, 'all_comment']);

//users
Route::get('/admin/users',[AdminController::class, 'users']);
Route::get('/admin/users/delete/{id}',[AdminController::class, 'delete_user']);
Route::get('/admin/users/post/{id}',[AdminController::class, 'allpost']);

//logout
Route::get('/admin/logout',function(){
    session()->forget(['adminData']);
    return redirect('admin/login');
});

Route::get('admin/setting',[SettingController::class,'index']);
Route::post('admin/setting',[SettingController::class,'save_setting']);

//Frontend


Route::get('/',[HomeController::class, 'index']);
Route::get('/create/profile',[UserprofileController::class,'createprofile']);
Route::get('/profile/{name}',[UserprofileController::class,'displayprofile']);

Route::group(['middleware'=>['Userprotected']],function(){
    Route::get('/frontend/post/addpost',[UserpostController::class, 'addpost']);
    Route::post('/frontend/savepost',[UserpostController::class, 'savepost']);
    Route::get('/frontend/post/managepost',[UserpostController::class, 'managepost']);
    Route::get('/frontend/post/editpost/{id}',[UserpostController::class, 'editpost']);
    Route::put('/frontend/post/updatepost/{id}',[UserpostController::class, 'updatepost']); 
    Route::get('/frontend/post/deletepost/{id}',[UserpostController::class, 'deletepost']);
    Route::get('/frontend/post/comment/{id}',[UserpostController::class, 'all_comment']);
});


Route::get('/frontend/blog',[HomeController::class, 'blog']);
Route::get('/frontend/category-blog/{id}',[HomeController::class, 'category_blog']);
Route::get('/frontend/tag-blog/{tag}',[HomeController::class, 'tag_blog']);
Route::get('/frontend/post',[HomeController::class, 'post']);
Route::get('/frontend/post/{id}',[HomeController::class, 'postmain']);
Route::post('save-comment/{id}',[UserpostController::class,'save_comment']);
Route::get('/testing',function()
{
    return view('test');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('ajaxRequest', 'PostController@ajaxRequest')->name('ajaxRequest');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/plans', [PlanController::class,'index'])->name('plans.index');
    Route::get('/plan/{plan}', [PlanController::class,'show'])->name('plans.show');
    Route::post('/subscription', [SubscriptionController::class,'create'])->name('subscription.create');

    //Routes for create Plan
    Route::get('admin/create/plan', [SubscriptionController::class,'createPlan'])->name('create.plan');
    Route::post('admin/store/plan', [SubscriptionController::class,'storePlan'])->name('store.plan');
    Route::get('admin/plans', [PlanController::class,'adminindex'])->name('plans.adminindex');
});
