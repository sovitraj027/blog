<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/category/changestatus', [CategoryController::class, 'changestatus']);
    Route::resource('categories', CategoryController::class);

    Route::get('/tag/changestatus', [TagController::class, 'changestatus']);
    Route::resource('tags', TagController::class);

    Route::get('/post/changestatus', [PostController::class, 'changestatus']);
    Route::resource('posts', PostController::class);
    Route::get('filter/post', [PostController::class, 'filterPost'])->name('filterPost');

    Route::get('users',[UserController::class,'index'])->name('user.index');

    Route::resource('roles', RoleController::class);

    Route::resource('sites', SiteSettingController::class);
});
