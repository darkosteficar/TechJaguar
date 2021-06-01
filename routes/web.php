<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CpuController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\GpuController;
use App\Http\Controllers\PsuController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\MoboController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CoolerController;
use App\Http\Controllers\PcCaseController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ManufacturerController;

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
Route::get('/category/{category}',[NewsController::class,'category'])->name('category');
Route::get('/manufacturer/{manufacturer}',[NewsController::class,'manufacturer'])->name('manufacturer');

Route::get('/compare',[CompareController::class,'compare'])->name('compare');

Route::get('/build',[BuildController::class,'index'])->name('build');
Route::get('/build/rams',[BuildController::class,'select_ram'])->name('build.rams');
Route::get('/build/psus',[PsuController::class,'index'])->name('build.psu');
Route::post('/build/psus',[PsuController::class,'add'])->name('build.psu.add');
Route::delete('/build/psus/remove',[PsuController::class,'remove'])->name('build.psu.remove');

Route::get('/build/mobos',[MoboController::class,'index'])->name('build.mobo');
Route::post('/build/mobo/add',[MoboController::class,'add'])->name('build.mobo.add');
Route::delete('/build/mobo/remove',[MoboController::class,'remove'])->name('build.mobo.remove');

Route::get('/build/cpus',[CpuController::class,'index'])->name('build.cpu');
Route::post('/build/cpu/add',[CpuController::class,'add'])->name('build.cpu.add');
Route::delete('/build/cpu/remove',[CpuController::class,'remove'])->name('build.cpu.remove');

Route::get('/build/gpus',[GpuController::class,'index'])->name('build.gpu');
Route::post('/build/gpu/add',[GpuController::class,'add'])->name('build.gpu.add');
Route::delete('/build/gpu/remove',[GpuController::class,'remove'])->name('build.gpu.remove');

Route::get('/build/rams',[RamController::class,'index'])->name('build.ram');
Route::post('/build/ram/add',[RamController::class,'add'])->name('build.ram.add');
Route::delete('/build/ram/remove',[RamController::class,'remove'])->name('build.ram.remove');

Route::get('/build/storages',[StorageController::class,'index'])->name('build.storage');
Route::post('/build/storage/add',[StorageController::class,'add'])->name('build.storage.add');
Route::delete('/build/storage/remove',[StorageController::class,'remove'])->name('build.storage.remove');

Route::get('/build/coolers',[CoolerController::class,'index'])->name('build.cooler');
Route::post('/build/cooler/add',[CoolerController::class,'add'])->name('build.cooler.add');
Route::delete('/build/cooler/remove',[CoolerController::class,'remove'])->name('build.cooler.remove');

Route::get('/build/fans',[FanController::class,'index'])->name('build.fan');
Route::post('/build/fan/add',[FanController::class,'add'])->name('build.fan.add');
Route::delete('/build/fan/remove',[FanController::class,'remove'])->name('build.fan.remove');

Route::get('/build/pc_cases',[PcCaseController::class,'index'])->name('build.pc_case');
Route::post('/build/pc_case/add',[PcCaseController::class,'add'])->name('build.pc_case.add');
Route::delete('/build/pc_case/remove',[PcCaseController::class,'remove'])->name('build.pc_case.remove');


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

Route::get('/admin/components/cases',[ComponentController::class,'read_pcCase'])->name('cases.index');
Route::get('/admin/components/cases/create',[ComponentController::class,'create_pcCase'])->name('cases.create');
Route::post('/admin/components/cases/store',[ComponentController::class,'store_pcCase'])->name('cases.store');
Route::delete('/admin/components/cases/delete',[ComponentController::class,'delete_pcCase'])->name('cases.delete');
Route::get('/admin/components/cases/{case}',[ComponentController::class,'edit_pcCase'])->name('cases.edit');
Route::post('/admin/components/cases/update',[ComponentController::class,'update_pcCase'])->name('cases.update');

Route::get('/admin/components/mobos',[ComponentController::class,'read_mobo'])->name('mobos.index');
Route::get('/admin/components/mobos/create',[ComponentController::class,'create_mobo'])->name('mobos.create');
Route::post('/admin/components/mobos/store',[ComponentController::class,'store_mobo'])->name('mobos.store');
Route::delete('/admin/components/mobos/delete',[ComponentController::class,'delete_mobo'])->name('mobos.delete');
Route::get('/admin/components/mobos/{mobo}',[ComponentController::class,'edit_mobo'])->name('mobos.edit');
Route::post('/admin/components/mobos/update',[ComponentController::class,'update_mobo'])->name('mobos.update');

Route::get('/admin/components/cpus',[ComponentController::class,'read_cpu'])->name('cpus.index');
Route::get('/admin/components/cpus/create',[ComponentController::class,'create_cpu'])->name('cpus.create');
Route::post('/admin/components/cpus/store',[ComponentController::class,'store_cpu'])->name('cpus.store');
Route::delete('/admin/components/cpus/delete',[ComponentController::class,'delete_cpu'])->name('cpus.delete');
Route::get('/admin/components/cpus/{cpu}',[ComponentController::class,'edit_cpu'])->name('cpus.edit');
Route::post('/admin/components/cpus/update',[ComponentController::class,'update_cpu'])->name('cpus.update');

Route::get('/admin/components/gpus',[ComponentController::class,'read_gpu'])->name('gpus.index');
Route::get('/admin/components/gpus/create',[ComponentController::class,'create_gpu'])->name('gpus.create');
Route::post('/admin/components/gpus/store',[ComponentController::class,'store_gpu'])->name('gpus.store');
Route::delete('/admin/components/gpus/delete',[ComponentController::class,'delete_gpu'])->name('gpus.delete');
Route::get('/admin/components/gpus/{gpu}',[ComponentController::class,'edit_gpu'])->name('gpus.edit');
Route::post('/admin/components/gpus/update',[ComponentController::class,'update_gpu'])->name('gpus.update');

Route::get('/admin/components/fans',[ComponentController::class,'read_fan'])->name('fans.index');
Route::get('/admin/components/fans/create',[ComponentController::class,'create_fan'])->name('fans.create');
Route::post('/admin/components/fans/store',[ComponentController::class,'store_fan'])->name('fans.store');
Route::delete('/admin/components/fans/delete',[ComponentController::class,'delete_fan'])->name('fans.delete');
Route::get('/admin/components/fans/{fan}',[ComponentController::class,'edit_fan'])->name('fans.edit');
Route::post('/admin/components/fans/update',[ComponentController::class,'update_fan'])->name('fans.update');


Route::get('/admin/components/manufacturers',[ManufacturerController::class,'read_manufacturer'])->name('manufacturers.index');
Route::get('/admin/components/manufacturers/create',[ManufacturerController::class,'create_manufacturer'])->name('manufacturers.create');
Route::post('/admin/components/manufacturers/store',[ManufacturerController::class,'store_manufacturer'])->name('manufacturers.store');
Route::delete('/admin/components/manufacturers/delete',[ManufacturerController::class,'delete_manufacturer'])->name('manufacturers.delete');
Route::get('/admin/components/manufacturers/{manufacturer}',[ManufacturerController::class,'edit_manufacturer'])->name('manufacturers.edit');
Route::post('/admin/components/manufacturers/update',[ManufacturerController::class,'update_manufacturer'])->name('manufacturers.update');

Route::get('/admin/components/categories',[CategoryController::class,'read_category'])->name('categories.index');
Route::get('/admin/components/categories/create',[CategoryController::class,'create_category'])->name('categories.create');
Route::post('/admin/components/categories/store',[CategoryController::class,'store_category'])->name('categories.store');
Route::delete('/admin/components/categories/delete',[CategoryController::class,'delete_category'])->name('categories.delete');
Route::get('/admin/components/categories/{category}',[CategoryController::class,'edit_category'])->name('categories.edit');
Route::post('/admin/components/categories/update',[CategoryController::class,'update_category'])->name('categories.update');

Route::get('/admin/components/apps/create',[AppController::class,'create'])->name('apps.create');
Route::post('/admin/components/apps/store',[AppController::class,'store'])->name('apps.store');

Route::get('/admin/results',[ResultController::class,'index'])->name('results.index');
Route::get('/admin/results/create',[ResultController::class,'create'])->name('results.create');
Route::post('/admin/results/store',[ResultController::class,'store'])->name('results.store');
Route::delete('/admin/results/delete',[ResultController::class,'delete'])->name('results.delete');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', ]], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});