<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductCategoryController;
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

Route::get('/', [ProductCategoryController::class,'index'])->name('admin.product_category.index');
Route::get('/create', [ProductCategoryController::class,'create'])->name('admin.product_category.create');
Route::post('/', [ProductCategoryController::class,'store'])->name('admin.product_category.store');
Route::get('/{product_category_id}', [ProductCategoryController::class,'edit'])->name('admin.product_category.edit');
Route::put('/{product_category_id}', [ProductCategoryController::class,'update'])->name('admin.product_category.update');
Route::get('/delete/{product_category_id}', [ProductCategoryController::class,'destroy'])->name('admin.product_category.destroy');