<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Microsite\MicrositeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified', 'can:microsite.home'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //microsites
    //Route::get('/microsite', [MicrositeController::class, 'index'])->middleware('can:microsite.home')->name('microsite.home');
    Route::resource('microsite', MicrositeController::class)
        ->middleware('can:microsite.home')->except(['destroy']);
});

require __DIR__.'/auth.php';
