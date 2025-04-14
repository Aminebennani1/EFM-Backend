<?php

use App\Http\Controllers\jardinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jardins', [jardinController::class,'index'])->name('jardins.index');

Route::get('/jardins/create', [jardinController::class,'create'])->name('jardins.create');
Route::post('/jardins', [jardinController::class,'store'])->name('jardins.store');

Route::get('/jardins/{jardin}', [jardinController::class,'show'])->name('jardins.show');

Route::get('/jardins/{jardin}/edit', [jardinController::class,'edit'])->name('jardins.edit');
Route::put('/jardins/{jardin}', [jardinController::class,'update'])->name('jardins.update');


Route::delete('/jardins/{jardin}', [jardinController::class,'destroy'])->name('jardins.destroy');

