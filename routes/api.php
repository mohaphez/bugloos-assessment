<?php

use App\Http\Controllers\Api\V1\Log\CountWithFilterController;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->name('api:v1:')->group(function () {

    Route::prefix('logs')->name('logs:')->group(function () {
        Route::any('count', CountWithFilterController::class)->name('count');
    });


});