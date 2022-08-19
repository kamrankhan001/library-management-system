<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Interface\InterfaceController;
use App\Http\Controllers\Interface\ProfileController;
use App\Http\Controllers\Admin\AdminRoutesController;


Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/home', [InterfaceController::class, 'home'])->name('home');
Route::get('/books', [InterfaceController::class, 'books'])->name('books');
Route::get('/book/detail/{id}', [InterfaceController::class, 'book_details'])->name('book_detail');

Route::middleware(['guest'])->group(function () {
    // Auth
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/book/request', [InterfaceController::class, 'book_request'])->name('book_request');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminRoutesController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/books', [AdminRoutesController::class, 'books'])->name('admin_books');
    Route::get('/admin/students', [AdminRoutesController::class, 'students'])->name('students');
    Route::get('/admin/request/books', [AdminRoutesController::class, 'request_books'])->name('request_books');
    Route::get('/admin/landed/books', [AdminRoutesController::class, 'landed_books'])->name('landed_books');
});
