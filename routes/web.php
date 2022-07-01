<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');


Route::prefix('/v1')->group(function() {
    // BLOCK
    Route::prefix('/blocks')->group(function() {
        Route::get('/', [BlockController::class, 'index']);
        Route::get('/{block:id}', [BlockController::class, 'show']);
    });

    // SLOT
    Route::prefix('/slots')->group(function() {
        Route::get('/', [SlotController::class, 'index']);
    });
});