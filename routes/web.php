<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/profile/{user}',[PageController::class, 'profile'])->name('profile.show');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

require __DIR__.'/auth.php';
