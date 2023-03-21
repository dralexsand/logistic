<?php

use App\Http\Controllers\Api\v1\DeliveryController;
use App\Http\Controllers\Api\v1\TransportController;
use Illuminate\Support\Facades\Route;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::name('api.')->group(function () {
    Route::apiResource('transports', TransportController::class);

    Route::get('/delivery_by_id', [DeliveryController::class, 'getSpecificCompaniyWithPrice'])->name('delivery_by_id');
    Route::get('/delivery', [DeliveryController::class, 'getCompaniesWithPrices'])->name('delivery.list');
});

