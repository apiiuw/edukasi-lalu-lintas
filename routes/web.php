<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAddBooksController;
use App\Http\Controllers\Admin\AdminAddVideosController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Error Test
Route::get('/400', function () {
    abort(400);
});

Route::get('/500', function () {
    abort(500);
});

Route::get('/403', function () {
    abort(403);
});

Route::get('/419', function () {
    abort(419);
});

// User Pages
Route::get('/', function () {
    return view('user.pages.beranda.index');
});

Route::get('/login', function () {
    return view('auth.login', ['title' => 'Login | Edulantas']);
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/sign-up', function () {
    return view('auth.sign-up', ['title' => 'Sign Up | Edulantas']);
});
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/sign-up-google', function () {
    return view('auth.sign-up-google', ['title' => 'Sign Up Google | Edulantas']);
});
Route::get('/sign-up-google', [GoogleAuthController::class, 'showGoogleSignUp'])->name('sign-up-google');
Route::post('/sign-up-google', [GoogleAuthController::class, 'completeGoogleSignUp'])->name('sign-up-google.process');
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/repositori', function () {
    return view('user.pages.repositori.index', ['title' => 'Repositori | Edulantas']);
});

// Subpage Repositori
Route::get('/request-item', function () {
    return view('user.pages.repositori.subpage.request-item', ['title' => 'Request Item | Edulantas']);
});

Route::get('/detail-item', function () {
    return view('user.pages.repositori.subpage.detail-item', ['title' => 'Detail Item | Edulantas']);
});

Route::get('/tentang-kami', function () {
    return view('user.pages.tentang-kami.index', ['title' => 'Tentang Kami | Edulantas']);
});

Route::get('/forum-diskusi', function () {
    return view('user.pages.forum-diskusi.index', ['title' => 'Forum Diskusi | Edulantas']);
});

// Subpage Forum Diskusi
Route::get('/form-forum-diskusi', function () {
    return view('user.pages.forum-diskusi.subpage.form-forum-diskusi', ['title' => 'Form Forum Diskusi | Edulantas']);
});

// Admin Pages
Route::get('/admin-statistik', function () {
    return view('admin.pages.statistik.index', ['title' => 'Admin Statistik | Edulantas']);
});

Route::get('/admin-item', function () {
    return view('admin.pages.item.index', ['title' => 'Admin Item | Edulantas']);
});

// Subpage Item
Route::get('/admin-add-books', function () {
    return view('admin.pages.item.subpage.add-books', ['title' => 'Admin Tambah Buku | Edulantas']);
});
Route::post('/admin-add-books', [AdminAddBooksController::class, 'store'])->name('admin.add.books');

Route::get('/admin-add-videos', function () {
    return view('admin.pages.item.subpage.add-videos', ['title' => 'Admin Tambah Video | Edulantas']);
});
Route::post('/admin-add-videos', [AdminAddVideosController::class, 'store'])->name('admin.add.videos');


Route::get('/admin-request-item', function () {
    return view('admin.pages.request-item.index', ['title' => 'Admin Request Item | Edulantas']);
});

Route::get('/admin-forum-diskusi', function () {
    return view('admin.pages.forum-diskusi.index', ['title' => 'Admin Forum Diskusi | Edulantas']);
});