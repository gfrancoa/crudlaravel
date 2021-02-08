<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\Auth\LoginControllerAdmin;

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

//vista ppal
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//login de usuario
//Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

//home de usuario
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//home de admin
Route::get('/admin','App\Http\Controllers\Admin\HomeController@index')->name('admin.home');

//login de admin
Route::get('/admin/login','App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.logout');

