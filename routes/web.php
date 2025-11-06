<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;

use App\Http\Controllers\TutorialController;
use App\Models\Tutorial;

// Configure route model binding to use slug
Route::bind('tutorial', function ($value) {
    return Tutorial::where('slug', $value)->firstOrFail();
});

// Public routes
Route::get('/', function () {
    return view('tutorials.index');
})->name('home');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('layouts.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tutorial creation workflow - MUST come before slug route
    Route::get('/tutorials/create', [TutorialController::class, 'create'])->name('tutorials.create');
    Route::get('/tutorials/{tutorial:slug}/edit', [TutorialController::class, 'edit'])->name('tutorials.edit');
    Route::get('/tutorials/{tutorial:slug}/media', [TutorialController::class, 'media'])->name('tutorials.media');
    Route::get('/tutorials/{tutorial:slug}/steps', [TutorialController::class, 'steps'])->name('tutorials.steps');
    Route::get('/tutorials/{tutorial:slug}/publish', [TutorialController::class, 'publish'])->name('tutorials.publish');
});

// Public tutorial viewer - MUST come after create route
Route::get('/tutorials/{tutorial:slug}', function (Tutorial $tutorial) {
    return view('tutorials.show', compact('tutorial'));
})->name('tutorials.show');

require __DIR__ . '/auth.php';

Route::get('/login/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('/login/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');
