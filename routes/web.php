<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
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

Route::resource('/files', FileController::class);
Route::resource('/categories', CategoryController::class);
Route::get('/download/{file}', [FileController::class,'download'])->name('download');
Route::get('(/getfiles', [FileController::class,'files'])->name('get.files');
Route::resource('/users',UserController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
