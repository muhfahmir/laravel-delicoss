<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\ProductController;
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

Route::get('/', [ProductController::class,'index'])->name('user.product.index');
// Route::get('/create', [ProductController::class,'create'])->name('admin.product.create');
// Route::post('/', [ProductController::class,'store'])->name('admin.product.store');
// Route::get('/{product_id}', [ProductController::class,'edit'])->name('admin.product.edit');
// Route::put('/{product_id}', [ProductController::class,'update'])->name('admin.product.update');
// Route::get('/delete/{product_id}', [ProductController::class,'destroy'])->name('admin.product.destroy');