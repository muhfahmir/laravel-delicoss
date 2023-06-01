<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserRoleController;
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

Route::get('/', [UserRoleController::class,'index'])->name('admin.user_role.index');
Route::get('/create', [UserRoleController::class,'create'])->name('admin.user_role.create');
Route::post('/', [UserRoleController::class,'store'])->name('admin.user_role.store');
Route::get('/{user_role_id}', [UserRoleController::class,'edit'])->name('admin.user_role.edit');
Route::put('/{user_role_id}', [UserRoleController::class,'update'])->name('admin.user_role.update');
Route::get('/delete/{user_role_id}', [UserRoleController::class,'destroy'])->name('admin.user_role.destroy');