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
        Route::get('/{slot:id}', [SlotController::class, 'show']);
    });
    
    // PARKING
    Route::prefix('/parking')->group(function() {
        Route::post('/enter', [ParkingController::class, 'enter']);
        Route::post('/exit', [ParkingController::class, 'exit']);
    });
});