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

Route::get('/', function () {
    return view('user.pages.beranda.index');
});

Route::get('/repositori', function () {
    return view('user.pages.repositori.index', ['title' => 'Repositori | Edulantas']);
});

Route::get('/tentang-kami', function () {
    return view('user.pages.tentang-kami.index', ['title' => 'Tentang Kami | Edulantas']);
});

Route::get('/forum-diskusi', function () {
    return view('user.pages.forum-diskusi.index', ['title' => 'Forum Diskusi | Edulantas']);
});

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