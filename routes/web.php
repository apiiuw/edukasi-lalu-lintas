<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.pages.beranda.index');
});

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