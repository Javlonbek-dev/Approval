<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contract/pdf/{id}', [ContractController::class, 'generatePDF',])->name('contract-file');
