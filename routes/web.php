<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\Userontroller;
use App\Http\Controllers\backend\CategoryController;

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


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::prefix('backend/')->name('backend.')->group(function (){
//User
Route::resource('users',Userontroller::class);
Route::get('changeUserStatus', [Userontroller::class, 'changeUserStatus'])->name('changeUserStatus');
//category
Route::resource('category',CategoryController::class);
Route::get('check_slug', [CategoryController::class, 'check_slug'])->name('check.slug');
});




