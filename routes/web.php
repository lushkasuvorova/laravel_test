<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('product.index'); //select*
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');; //insert(form)
Route::post('/products', [ProductController::class, 'store'])->name('product.store'); //insert(submit)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');//form
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('product.update');//submit
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
