<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\TestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/conversion', [TestController::class, 'saveConversion'])->name('saveConversion');

Route::group([
    'prefix' => 'tests'
], function () {
    Route::put('/{id}/start', [TestController::class, 'start']);
    Route::put('/{id}/stop', [TestController::class, 'stop']);
});


Route::apiResources([
    'tests' => TestController::class,
]);
