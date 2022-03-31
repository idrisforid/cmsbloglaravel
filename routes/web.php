<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//blog routes
Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/all-blog', [App\Http\Controllers\BlogController::class, 'allblog'])->name('all.blog');
Route::get('/category-blog/{category}', [App\Http\Controllers\BlogController::class, 'categoryblog']);
Route::get('/search-blog', [App\Http\Controllers\BlogController::class, 'searchblog']);



Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/all-admin', [App\Http\Controllers\AdminController::class, 'alladmin'])->name('all.admin');
    });

Auth::routes();

//admin routes
Route::get('/admin-login', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.login');

Route::post('/store-admin', [App\Http\Controllers\AdminController::class, 'storeadmin'])->name('store.admin');
Route::get('/delete-admin/{id}', [App\Http\Controllers\AdminController::class, 'deletedmin'])->name('delete.admin');


//my profile routes
Route::get('/MyProfile', [App\Http\Controllers\ProfileController::class, 'showprofile'])->name('myprofile');
Route::post('/UpdateProfile/{id}', [App\Http\Controllers\ProfileController::class, 'updateprofile']);


//category routes
Route::get('/all-category', [App\Http\Controllers\CategoryController::class, 'allcategory'])->name('all.category');
Route::post('/store-category', [App\Http\Controllers\CategoryController::class, 'storecategory'])->name('store.category');
Route::get('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deletecategory'])->name('delete.category');

//post routes
Route::get('/all-post', [App\Http\Controllers\PostController::class, 'allpost'])->name('all.post');
Route::get('/create-post', [App\Http\Controllers\PostController::class, 'createpost'])->name('create.post');
Route::post('/store-post', [App\Http\Controllers\PostController::class, 'storepost'])->name('store.post');
Route::get('/edit-post/{id}', [App\Http\Controllers\PostController::class, 'editpost'])->name('edit.post');
Route::post('/update-post/{id}', [App\Http\Controllers\PostController::class, 'updatepost'])->name('update.post');
Route::get('/delete-show/{id}', [App\Http\Controllers\PostController::class, 'deleteshow'])->name('delete.show');
Route::get('/delete-post/{id}', [App\Http\Controllers\PostController::class, 'deletepost'])->name('delete.post');
Route::get('/full-post/{id}', [App\Http\Controllers\PostController::class, 'fullpost'])->name('full.post');

//Comment routes
Route::post('/store-comment/{id}', [App\Http\Controllers\CommentController::class, 'storecomment'])->name('store.comment');
Route::get('/comment-approval', [App\Http\Controllers\CommentController::class, 'allcomment']);
Route::get('/approve-comment/{id}', [App\Http\Controllers\CommentController::class, 'approvecomment']);
Route::get('/disapprove-comment/{id}', [App\Http\Controllers\CommentController::class, 'disapprovecomment']);
Route::get('/delete-comment/{id}', [App\Http\Controllers\CommentController::class, 'deletecomment']);

