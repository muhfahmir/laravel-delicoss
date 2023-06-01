<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
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

Route::get('/', [UserController::class,'index'])->name('admin.user.index');
Route::get('/create', [UserController::class,'create'])->name('admin.user.create');
Route::post('/', [UserController::class,'store'])->name('admin.user.store');
Route::get('/{user_id}', [UserController::class,'edit'])->name('admin.user.edit');
Route::put('/{user_id}', [UserController::class,'update'])->name('admin.user.update');
Route::get('/delete/{user_id}', [UserController::class,'destroy'])->name('admin.user.destroy');