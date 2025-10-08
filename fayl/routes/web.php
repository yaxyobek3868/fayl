<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;


Route::resource('photos', PhotoController::class);


Route::get('/', [PhotoController::class, 'index'])->name('home');
