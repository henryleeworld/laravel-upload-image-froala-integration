<?php

use App\Http\Controllers\FroalaController;
use Illuminate\Support\Facades\Route;

Route::get('froala', [FroalaController::class, 'index']);
Route::post('froala/upload', [FroalaController::class, 'upload'])->name('froala.upload');
