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
    return view('user.pages.repositori.index');
});

Route::get('/tentang-kami', function () {
    return view('user.pages.tentang-kami.index');
});

Route::get('/forum-diskusi', function () {
    return view('user.pages.forum-diskusi.index');
});