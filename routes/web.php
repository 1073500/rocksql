<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/picture', [\App\Http\Controllers\DashboardController::class, 'getProfilePicture'])->name('dashboard.picture');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');

});

require __DIR__ . '/auth.php';

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
            abort(403, 'Unauthorized action.');
        }

        return view('admin.dashboard');
    })->name('admin');
});

// comments
Route::middleware('auth')->group(function () {
    Route::post('rocks/{rock}/comments', [\App\Http\Controllers\RockController::class, 'storeComment'])->name('comments.store');
    Route::delete('comments/{comment}', [\App\Http\Controllers\RockController::class, 'destroyComment'])->name('comments.destroy');
});

// crud voor users
Route::middleware('auth')->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// actief of niet actief
Route::middleware('auth')->group(function () {
    Route::post('/users/{id}/isActive', [UserController::class, 'isActive'])->name('users.isActive');
});
