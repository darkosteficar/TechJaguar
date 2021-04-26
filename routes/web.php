<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\ResultController;
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

Route::get('/build',[BuildController::class,'index'])->name('build');
Route::get('/build/rams',[BuildController::class,'select_ram'])->name('build.rams');

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

Route::get('/admin/components/cpus/create',[ComponentController::class,'create_cpu'])->name('cpus.create');
Route::post('/admin/components/cpus/store',[ComponentController::class,'store_cpu'])->name('cpus.store');

Route::get('/admin/components/rams',[ComponentController::class,'read_ram'])->name('rams.index');
Route::get('/admin/components/rams/create',[ComponentController::class,'create_ram'])->name('rams.create');
Route::post('/admin/components/rams/store',[ComponentController::class,'store_ram'])->name('rams.store');
Route::delete('/admin/components/rams/delete',[ComponentController::class,'delete_ram'])->name('rams.delete');
Route::get('/admin/components/rams/{ram}',[ComponentController::class,'edit_ram'])->name('rams.edit');
Route::post('/admin/components/rams/update',[ComponentController::class,'update_ram'])->name('rams.update');

Route::get('/admin/components/storages',[ComponentController::class,'read_storage'])->name('storages.index');
Route::get('/admin/components/storages/create',[ComponentController::class,'create_storage'])->name('storages.create');
Route::post('/admin/components/storages/store',[ComponentController::class,'store_storage'])->name('storages.store');
Route::delete('/admin/components/storages/delete',[ComponentController::class,'delete_storage'])->name('storages.delete');
Route::get('/admin/components/storages/{storage}',[ComponentController::class,'edit_storage'])->name('storages.edit');
Route::post('/admin/components/storages/update',[ComponentController::class,'update_storage'])->name('storages.update');

Route::get('/admin/components/coolers',[ComponentController::class,'read_cooler'])->name('coolers.index');
Route::get('/admin/components/coolers/create',[ComponentController::class,'create_cooler'])->name('coolers.create');
Route::post('/admin/components/coolers/store',[ComponentController::class,'store_cooler'])->name('coolers.store');
Route::delete('/admin/components/coolers/delete',[ComponentController::class,'delete_cooler'])->name('coolers.delete');
Route::get('/admin/components/coolers/{cooler}',[ComponentController::class,'edit_cooler'])->name('coolers.edit');
Route::post('/admin/components/coolers/update',[ComponentController::class,'update_cooler'])->name('coolers.update');

Route::get('/admin/components/psus',[ComponentController::class,'read_psu'])->name('psus.index');
Route::get('/admin/components/psus/create',[ComponentController::class,'create_psu'])->name('psus.create');
Route::post('/admin/components/psus/store',[ComponentController::class,'store_psu'])->name('psus.store');
Route::delete('/admin/components/psus/delete',[ComponentController::class,'delete_psu'])->name('psus.delete');
Route::get('/admin/components/psus/{psu}',[ComponentController::class,'edit_psu'])->name('psus.edit');
Route::post('/admin/components/psus/update',[ComponentController::class,'update_psu'])->name('psus.update');

Route::get('/admin/components/cases',[ComponentController::class,'read_case'])->name('cases.index');
Route::get('/admin/components/cases/create',[ComponentController::class,'create_case'])->name('cases.create');
Route::post('/admin/components/cases/store',[ComponentController::class,'store_case'])->name('cases.store');
Route::delete('/admin/components/cases/delete',[ComponentController::class,'delete_case'])->name('cases.delete');
Route::get('/admin/components/cases/{case}',[ComponentController::class,'edit_case'])->name('cases.edit');
Route::post('/admin/components/cases/update',[ComponentController::class,'update_case'])->name('cases.update');

Route::get('/admin/components/apps/create',[AppController::class,'create'])->name('apps.create');
Route::post('/admin/components/apps/store',[AppController::class,'store'])->name('apps.store');

Route::get('/admin/results',[ResultController::class,'index'])->name('results.index');
Route::get('/admin/results/create',[ResultController::class,'create'])->name('results.create');
Route::post('/admin/results/store',[ResultController::class,'store'])->name('results.store');
Route::delete('/admin/results/delete',[ResultController::class,'delete'])->name('results.delete');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', ]], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});