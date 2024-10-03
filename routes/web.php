<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/file/download/{id}', [ApplicationController::class, 'download_file'])->name('file.download');

