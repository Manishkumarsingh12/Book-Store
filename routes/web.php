<?php

use \App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('adminPage');
Route::get('/adminbooks', [AdminController::class, 'books'])->name('adminbook');
Route::get('/admin/books/create', [AdminController::class, 'create']);
Route::post('bookstore', [AdminController::class, 'store'])->name('bookstore');
Route::get('/editbook/id/{id}', [AdminController::class, 'edit'])->name('editbook');
Route::put('/updatebook/id/{id}', [AdminController::class, 'update'])->name('updatebook');
Route::get('/admin/books/{id}/delete', [AdminController::class, 'destroy']);

Route::get('/category', [AdminController::class, 'category'])->name('category');
Route::post('addcategory', [AdminController::class, 'addcategory'])->name('addcategory');
Route::get('/userPage', [AuthController::class, 'userPage'])->name('userPage');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');