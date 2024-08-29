<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/status', StatusController::class)->names('user_status');
Route::apiResource('/company', CompanyController::class)->names('company');
