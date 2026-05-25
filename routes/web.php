<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\DocumentController;

Route::middleware(['auth'])->group(function () {

    Route::get('/documents/{id}', [DocumentController::class, 'show']);

    Route::post('/documents/{id}/update',
        [DocumentController::class, 'update']);

    Route::post('/documents/{id}/cursor',
        [DocumentController::class, 'cursor']);
    
    Route::get('/documents/{id}/cursor',
        [DocumentController::class, 'getCursor']);

    Route::get('/documents/{id}/history',
        [DocumentController::class, 'history']);
    
});