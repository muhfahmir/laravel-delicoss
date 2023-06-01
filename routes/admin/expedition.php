<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ExpeditionController;
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

Route::get('/', [ExpeditionController::class,'index'])->name('admin.expedition.index');
Route::get('/create', [ExpeditionController::class,'create'])->name('admin.expedition.create');
Route::post('/', [ExpeditionController::class,'store'])->name('admin.expedition.store');
Route::get('/{expedition_id}', [ExpeditionController::class,'edit'])->name('admin.expedition.edit');
Route::put('/{expedition_id}', [ExpeditionController::class,'update'])->name('admin.expedition.update');
Route::get('/delete/{expedition_id}', [ExpeditionController::class,'destroy'])->name('admin.expedition.destroy');