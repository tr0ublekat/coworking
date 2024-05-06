<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'about']);
Route::get('/test', [MainController::class, 'test']);
Route::get('/about', [MainController::class, 'about']);
Route::get('/review', [MainController::class, 'review'])->name('review');
Route::post('/review/check', [MainController::class, 'review_check']);
Route::get('/reserve', [MainController::class, 'reserve'])
    ->name('reserve');
Route::post('/reserve/check2', [MainController::class,
     'reserve_check_2'])->name('reserve_check_2');
Route::post('/save-date', [MainController::class, 'save'])->name('save_date');
Route::get('/save-date', [MainController::class, 'save'])->name('save_date_get');

