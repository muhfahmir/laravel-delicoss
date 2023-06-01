<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\CartController;
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

Route::get('/', [CartController::class,'index'])->name('user.cart.index');
// Route::get('/create', [CartController::class,'create'])->name('user.cart.create');
Route::post('/', [CartController::class,'store'])->name('user.cart.store');
// Route::get('/{cart_id}', [CartController::class,'edit'])->name('user.cart.edit');
Route::post('/cart', [CartController::class,'update'])->name('user.cart.update');
Route::get('/delete/{cart_id}', [CartController::class,'destroy'])->name('user.cart.destroy');