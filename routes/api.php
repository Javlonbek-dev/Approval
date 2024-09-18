<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DBBITController;
use App\Http\Controllers\IFUTController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\THSHTController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/status', StatusController::class)->names('user_status');
Route::apiResource('/company', CompanyController::class)->names('company');
Route::apiResource('/region', RegionController::class)->names('region');
Route::apiResource('/dbit', DBBITController::class)->names('dbit');
Route::apiResource('/ifut', IFUTController::class)->names('ifut');
Route::apiResource('/thsht', THSHTController::class)->names('thsht');
Route::apiResource('/application', ApplicationController::class)->names('application');
