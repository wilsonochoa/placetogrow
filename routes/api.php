<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\Microsite\MicrositeController;

Route::get('/microsite', [MicrositeController::class, 'index'])->name('microsite.index');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
