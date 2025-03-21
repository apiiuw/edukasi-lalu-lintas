<?php

use Illuminate\Support\Facades\Route;
use App\Models\Visitor;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\AdminStatistikController;
use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminAddBooksController;
use App\Http\Controllers\Admin\AdminAddVideosController;
use App\Http\Controllers\Admin\AdminRequestItemController;
use App\Http\Controllers\Admin\AdminForumDiskusiController;

use App\Http\Controllers\User\RepositoriController;
use App\Http\Controllers\User\DetailItemController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\RequestItemController;
use App\Http\Controllers\User\FormForumDiskusiController;
use App\Http\Controllers\User\ForumDiskusiController;

use Illuminate\Support\Facades\DB;

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

// Halaman Error
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



// Halaman Auth
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



// Halaman Tidak Perlu Login
Route::get('/', function () {
    // Dapatkan data user (atau tamu)
    $user = auth()->user();
    $name = $user ? $user->name : 'Tamu';
    $email = $user ? $user->email : 'tamu@guest.com';

    // Tambahkan visitor
    Visitor::create([
        'name' => $name,
        'email' => $email,
        'visit_date' => now(),
        'page' => 'Beranda',
        'item_id' => null,
        'item_judul' => null,
        'item_kategori' => null,
    ]);

    return view('user.pages.beranda.index');
});

Route::get('/repositori', [RepositoriController::class, 'index'])->name('repositori.index');
Route::get('/repositori', [SearchController::class, 'index'])->name('search.index');

Route::get('/tentang-kami', function () {
    // Dapatkan data user (atau tamu)
    $user = auth()->user();
    $name = $user ? $user->name : 'Tamu';
    $email = $user ? $user->email : 'tamu@guest.com';

    // Tambahkan visitor
    Visitor::create([
        'name' => $name,
        'email' => $email,
        'visit_date' => now(),
        'page' => 'Tentang Kami',
        'item_id' => null,
        'item_judul' => null,
        'item_kategori' => null,
    ]);
    
    return view('user.pages.tentang-kami.index', ['title' => 'Tentang Kami | Edulantas']);
});

Route::get('/forum-diskusi', [ForumDiskusiController::class, 'index']);
Route::get('/forum-diskusi/search', [ForumDiskusiController::class, 'search'])->name('forum-diskusi.search');



// Halaman yang hanya untuk user login + tracking visitor
Route::middleware('auth')->group(function () {
    // Subpage Repositori
    Route::get('/request-item', [RequestItemController::class, 'index'])->name('request-item.index');
    Route::post('/request-item', [RequestItemController::class, 'store'])->name('request-items.store');

    // Subpage Forum Diskusi
    Route::get('/form-forum-diskusi', [FormForumDiskusiController::class, 'index'])->name('form-forum-diskusi.index');
    Route::post('/form-forum-diskusi', [FormForumDiskusiController::class, 'store'])->name('form-forum-diskusi.store');

    // Detail Item
    Route::get('/detail-item/{type_id}', [DetailItemController::class, 'showByTypeId'])->name('detail-item.showByTypeId');
});



// Halaman khusus Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin-statistik', function () {
        return view('admin.pages.statistik.index', ['title' => 'Admin Statistik | Edulantas']);
    });
    Route::get('/admin-statistik', [AdminStatistikController::class, 'index'])->name('admin.statistik');
    Route::get('/admin/statistik/download', [AdminStatistikController::class, 'download'])->name('statistik.download');
    
    Route::get('/admin-item', function () {
        return view('admin.pages.item.index', ['title' => 'Admin Item | Edulantas']);
    });

    Route::get('/admin-item', [AdminItemController::class, 'index'])->name('item.index');
    Route::get('/admin-item', [AdminItemController::class, 'search'])->name('item.search');
    
    // Subpage Item
    Route::get('/admin-add-books', function () {
        return view('admin.pages.item.subpage.add-books', ['title' => 'Admin Tambah Buku | Edulantas']);
    });
    Route::post('/admin-add-books', [AdminAddBooksController::class, 'store'])->name('admin.add.books');
    
    Route::get('/admin-add-videos', function () {
        return view('admin.pages.item.subpage.add-videos', ['title' => 'Admin Tambah Video | Edulantas']);
    });
    Route::post('/admin-add-videos', [AdminAddVideosController::class, 'store'])->name('admin.add.videos');

    Route::get('/admin-edit-books', function () {
        return view('admin.pages.item.subpage.edit-books', ['title' => 'Admin Edit Buku | Edulantas']);
    });
    Route::get('/admin-edit-books/{id}', [AdminItemController::class, 'editBook'])->name('admin.edit.book');
    Route::put('/admin-update-books/{id}', [AdminItemController::class, 'updateBook'])->name('admin.update.book');


    Route::get('/admin-edit-videos', function () {
        return view('admin.pages.item.subpage.edit-videos', ['title' => 'Admin Edit Video | Edulantas']);
    });
    Route::get('/admin-edit-videos/{id}', [AdminItemController::class, 'editVideo'])->name('admin.edit.video');
    Route::put('/admin-update-videos/{id}', [AdminItemController::class, 'updateVideo'])->name('admin.update.video');

    Route::delete('/admin-delete-books/{id}', [AdminItemController::class, 'destroyBook'])->name('admin.delete.book');
    Route::delete('/admin-delete-videos/{id}', [AdminItemController::class, 'destroyVideo'])->name('admin.delete.video');
    
    Route::get('/admin-request-item', [AdminRequestItemController::class, 'index'])->name('admin-request-item.index');
    Route::get('/admin-request-item/{id}/edit', [AdminRequestItemController::class, 'edit'])->name('admin-request-item.edit');
    Route::put('/admin-request-item/{id}', [AdminRequestItemController::class, 'update'])->name('admin-request-item.update');
    
    Route::get('/admin-forum-diskusi', [AdminForumDiskusiController::class, 'index'])->name('admin-forum-diskusi.index');
    Route::post('/admin/forum-diskusi/{id}', [AdminForumDiskusiController::class, 'update']);

});

// Test PDF

Route::get('/test-pdf-5-tahun', function() {
    return view('admin.pages.statistik.pdf-files.pdf-multiyear');
});