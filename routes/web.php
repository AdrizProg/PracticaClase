<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommunityLinkController;
use App\Http\Controllers\CommunityLinkUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Api\v1\CommunityLinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/dashboard', [CommunityLinkController::class, 'store'])
->middleware(['auth', 'verified']);

Route::get('/mylinks', [CommunityLinkController::class, 'mylinks'] )->middleware(['auth', 'verified'])->name('mylinks');

Route::get('dashboard/{channel:slug}', [CommunityLinkController::class, 'index']);

Route::post('/votes/{link}', [CommunityLinkUserController::class, 'store']);

Route::get('/analytics', function () {
    return view('analytics');
})->middleware(['auth', 'verified'])->name('analytics');

Route::get('/inicio', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)->middleware('can:administrate,App\Models\User');

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

require __DIR__.'/auth.php';
