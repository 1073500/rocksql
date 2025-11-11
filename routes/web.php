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
//    Route::get('rocks', [\App\Http\Controllers\RockController::class, 'index'])->name('rocks.index');
//    Route::post('rocks', [\App\Http\Controllers\RockController::class, 'store'])->name('rocks.store');
//
//    Route::get('rocks/create', [\App\Http\Controllers\RockController::class, 'create'])->name('rocks.create');
//    Route::get('rocks/{rock}', [\App\Http\Controllers\RockController::class, 'show'])->name('rocks.show');
//    Route::put('rocks/{rock}', [\App\Http\Controllers\RockController::class, 'update'])->name('rocks.update');
//    Route::delete('rocks/{rock}', [\App\Http\Controllers\RockController::class, 'destroy'])->name('rocks.destroy');
//    Route::get('rocks/{rock}/edit', [\App\Http\Controllers\RockController::class, 'edit'])->name('rocks.edit');
    Route::resource('rocks', App\Http\Controllers\RockController::class);
});
