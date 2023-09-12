<?php

use App\Http\Controllers\API\PaymentsController;
use App\Http\Controllers\API\WorkersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/payments',PaymentsController::class);
Route::post('workers/register',[WorkersController::class,'register']);
Route::post('workers/login',[WorkersController::class,'login']);
