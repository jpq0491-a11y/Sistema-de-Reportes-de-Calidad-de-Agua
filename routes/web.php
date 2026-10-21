<?php

use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::view('info-sistema', 'info-sistema')->name('info-sistema');

    Route::resource('reporte', ReporteController::class);
});

require __DIR__.'/settings.php';
