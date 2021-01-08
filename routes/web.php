<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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

Route::get('/', function(){
    return view('auth.login');
   });

Auth::routes();
Route::resource("users", UserController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
   })->name("register");
Route::resource("users", UserController::class);
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::get('/categories/{id}/restore', [CategoryController::class,'restore'])->name('categories.restore');
Route::delete('/categories/{category}/delete-permanent',[CategoryController::class, 'deletePermanent'])->name('categories.delete-permanent');
Route::get('/ajax/categories/search', [CategoryController::class,'ajaxSearch'])->name('categories.ajax-search');

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);

