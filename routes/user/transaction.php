<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\TransactionController;
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

Route::get('/', [TransactionController::class,'index'])->name('user.transaction.index');
Route::get('/create', [TransactionController::class,'create'])->name('user.transaction.create');
Route::post('/', [TransactionController::class,'store'])->name('user.transaction.store');
Route::get('/{transaction_id}', [TransactionController::class,'edit'])->name('user.transaction.edit');
Route::put('/{transaction_id}', [TransactionController::class,'update'])->name('user.transaction.update');
Route::post('/upload-image', [TransactionController::class,'uploadImage'])->name('user.transaction.uploadImage');
Route::get('/delete/{transaction_id}', [TransactionController::class,'destroy'])->name('user.transaction.destroy');