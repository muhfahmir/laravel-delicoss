<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TransactionController;
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

Route::get('/', [TransactionController::class, 'index'])->name('admin.transaction.index');
Route::get('/{transaction_id}/{status_payment}', [TransactionController::class, 'updateStatus'])->name('admin.transaction.updateStatus');
// Route::get('/create', [TransactionController::class,'create'])->name('admin.transaction.create');
// Route::post('/', [TransactionController::class,'store'])->name('admin.transaction.store');
// Route::get('/{transaction_id}', [TransactionController::class,'edit'])->name('admin.transaction.edit');
// Route::put('/{transaction_id}', [TransactionController::class,'update'])->name('admin.transaction.update');
// Route::get('/delete/{transaction_id}', [TransactionController::class,'destroy'])->name('admin.transaction.destroy');
