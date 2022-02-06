<?php

/* 
* controller define
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {return view('welcome');});

/* 
* urls of products here
*/
Route::prefix('products')->group(function (){
    Route::get('index', [ProductController::class, 'index'])->name('index');
    Route::get('add', [ProductController::class, 'add'])->name('add');
    Route::post('store', [ProductController::class, 'store'])->name('store');
    Route::get('view/{id}', [ProductController::class, 'view'])->name('view');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');    
});

/* 
* default set 404 page in routes side
*/
Route::fallback(function () { return view("errors.404"); });
