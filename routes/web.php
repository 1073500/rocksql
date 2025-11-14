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

//HomepageController routes
Route::get('homepage', [\App\Http\Controllers\HomepageController::class, 'homepage'])->name('homepage');
Route::get('contact', [\App\Http\Controllers\HomepageController::class, 'contact'])->name('contact');
Route::get('about', [\App\Http\Controllers\HomepageController::class, 'about'])->name('about');

// CRUD : RockController routes
Route::middleware('auth')->group(function () {
    Route::get('rocks/{rock}/edit', [\App\Http\Controllers\RockController::class, 'edit'])->name('rocks.edit');
    Route::resource('rocks', App\Http\Controllers\RockController::class);
});

// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('admin.dashboard');
    });
});



