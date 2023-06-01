<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AddressController;
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

Route::get('/', [AddressController::class,'index'])->name('user.address.index');
Route::get('/create', [AddressController::class,'create'])->name('user.address.create');
Route::post('/', [AddressController::class,'store'])->name('user.address.store');
Route::get('/{address_id}', [AddressController::class,'edit'])->name('user.address.edit');
Route::post('/address', [AddressController::class,'update'])->name('user.address.update');
Route::get('/delete/{address_id}', [AddressController::class,'destroy'])->name('user.address.destroy');