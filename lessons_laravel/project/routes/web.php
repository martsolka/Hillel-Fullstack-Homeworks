<?php

use App\Http\Controllers\PollTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\RestrictMozillaAccess;
use Illuminate\Support\Facades\Route;

Route::middleware(RestrictMozillaAccess::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::prefix('poll-types')->name('poll-types.')->group(function () {
    Route::get('/', [PollTypeController::class, 'index'])->name('index');
    Route::get('/create', [PollTypeController::class, 'create'])->name('create');
    Route::post('/', [PollTypeController::class, 'store'])->name('store');
    Route::get('/edit/{pollType}', [PollTypeController::class, 'edit'])->name('edit');
    Route::put('/{pollType}', [PollTypeController::class, 'update'])->name('update');
    Route::delete('/{pollType}', [PollTypeController::class, 'destroy'])->name('destroy');
});

Route::resource('products', ProductController::class);