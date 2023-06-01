<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\OrderTypeController;
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

Route::get('/', [OrderTypeController::class,'index'])->name('admin.order_type.index');
Route::get('/create', [OrderTypeController::class,'create'])->name('admin.order_type.create');
Route::post('/', [OrderTypeController::class,'store'])->name('admin.order_type.store');
Route::get('/{order_type_id}', [OrderTypeController::class,'edit'])->name('admin.order_type.edit');
Route::put('/{order_type_id}', [OrderTypeController::class,'update'])->name('admin.order_type.update');
Route::get('/delete/{order_type_id}', [OrderTypeController::class,'destroy'])->name('admin.order_type.destroy');