<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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
Route::resource('admin/category',CategoryController::class)->except(['show']);

//Route::get('category/api',[CategoryController::class,'api'])->name('category.api');

Route::resource('admin/product',ProductController::class)->except(['show']);

Route::group([
    'as'     => 'admin.',
    'prefix' => 'admin',
], static function () {
    Route::get('/', [LoginController::class, 'formLogin'])->name('index');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');
    Route::post('/product', [ProductController::class, 'index'])->name('product');
});
//Route::group([
//    'as'     => 'category.',
//    'prefix' => 'category',
//], static function () {
//    Route::get('/', [CategoryController::class, 'index'])->name('index');
//    Route::get('/create', [CategoryController::class, 'create'])->name('create');
//    Route::post('/create', [CategoryController::class, 'store'])->name('store');
//    Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
//    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
//    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
//});
