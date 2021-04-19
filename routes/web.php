<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\ComponentController;

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


Route::get('/',[NewsController::class,'index'])->name('index');
Route::get('/post/{post}',[NewsController::class,'post'])->name('post.view');
Route::get('/category',[NewsController::class,'category'])->name('post.category');

Route::get('/compare',[CompareController::class,'compare'])->name('compare');

Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'logged']);
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'store']);

Route::get('/admin/dashboard',[PostController::class,'index'])->name('admin.dashboard');
Route::post('/posts/store',[PostController::class,'store'])->name('post.store');
Route::post('/posts/delete',[PostController::class,'delete'])->name('post.delete');
Route::get('/posts',[PostController::class,'create'])->name('posts.create');
Route::get('/posts/{post}/edit',[PostController::class,'update'])->name('posts.update');
Route::post('/posts/update',[PostController::class,'save'])->name('posts.save');
Route::get('/posts/all',[PostController::class,'read'])->name('posts.read');

Route::get('/admin/components',[ComponentController::class,'index'])->name('admin.components.index');
Route::get('/admin/components/chipsets',[ComponentController::class,'read_chipset'])->name('chipsets.index');
Route::get('/admin/components/chipsets/create',[ComponentController::class,'create_chipset'])->name('chipsets.create');
Route::get('/admin/components/chipsets/{chipset}',[ComponentController::class,'edit_chipset'])->name('chipsets.edit');
Route::post('/admin/components/chipsets/update',[ComponentController::class,'update_chipset'])->name('chipsets.update');
Route::post('/admin/components/chipsets/store',[ComponentController::class,'store_chipset'])->name('chipsets.store');
Route::delete('/admin/components/chipsets/delete',[ComponentController::class,'delete_chipset'])->name('chipsets.delete');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', ]], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});