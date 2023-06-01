<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PaymentTypeController;
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

Route::get('/', [PaymentTypeController::class,'index'])->name('admin.payment_type.index');
Route::get('/create', [PaymentTypeController::class,'create'])->name('admin.payment_type.create');
Route::post('/', [PaymentTypeController::class,'store'])->name('admin.payment_type.store');
Route::get('/{payment_type_id}', [PaymentTypeController::class,'edit'])->name('admin.payment_type.edit');
Route::put('/{payment_type_id}', [PaymentTypeController::class,'update'])->name('admin.payment_type.update');
Route::get('/delete/{payment_type_id}', [PaymentTypeController::class,'destroy'])->name('admin.payment_type.destroy');