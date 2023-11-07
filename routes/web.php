<?php

use App\Http\Controllers\EbookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Ebook;

Route::get('/', [UserController::class, 'homeview'])->name('layouts.home');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('users.showRegistrationForm');
Route::post('/register', [UserController::class, 'register'])->name('users.register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('users.showLoginForm');
Route::post('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('/edit', [UserController::class, 'showEditForm'])->name('users.showEditForm');
    Route::post('/edit', [UserController::class, 'update'])->name('users.edit');
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/ebooks/{ebook}/like', [LikeController::class, 'toggleLike'])->name('ebooks.like');
    Route::get('/ebooks/{ebook}/reviews', [ReviewController::class, 'index'])->name('ebooks.reviews.index');
    Route::get('/ebooks/{ebook}/reviews/create', [ReviewController::class, 'create'])->name('ebooks.reviews.create');
    Route::post('/ebooks/{ebook}/reviews', [ReviewController::class, 'store'])->name('ebooks.reviews.store');
});
Route::get('/ebooks', [EbookController::class, 'index'])->name('ebooks.index');
Route::get('/ebooks/{ebook}', [EbookController::class, 'show'])->name('ebooks.showX');
Route::get('/search', [EbookController::class, 'search'])->name('search');




Route::middleware(['admin'])->group(function () {
    Route::get('/ebooks/{ebook}', [EbookController::class, 'show'])->name('ebooks.showX');
    Route::get('/create', [EbookController::class, 'create'])->name('xxl');
    Route::get('/ebooks/{ebook}/edit', [EbookController::class, 'edit'])->name('ebooks.edit');
    Route::delete('/ebooks/{ebook}', [EbookController::class, 'destroy'])->name('ebooks.destroy');
    Route::put('/ebooks/{ebook}', [EbookController::class, 'update'])->name('ebooks.update');
    Route::post('/ebooks', [EbookController::class, 'store'])->name('ebooks.store');
    Route::delete('/users/{user}', [UserController::class, 'Admindestroy'])->name('Adminusers.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/dashboard/ebooks', [DashboardController::class, 'ebooks'])->name('dashboard.ebooks');
    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard.users');
});

Route::view('/{any}', 'errors.404')->where('any', '.*')->name('404');
Route::view('/{any}', 'errors.500')->where('any', '.*')->name('error.500');
