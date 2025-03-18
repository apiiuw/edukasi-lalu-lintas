<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminAddBooksController;
use App\Http\Controllers\Admin\AdminAddVideosController;
use App\Http\Controllers\Admin\AdminRequestItemController;

use App\Http\Controllers\User\RepositoriController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\RequestItemController;

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
    return view('user.pages.beranda.index');
});

Route::get('/repositori', [RepositoriController::class, 'index'])->name('repositori.index');
Route::get('/repositori', [SearchController::class, 'index'])->name('search.index');

Route::get('/tentang-kami', function () {
    return view('user.pages.tentang-kami.index', ['title' => 'Tentang Kami | Edulantas']);
});

Route::get('/forum-diskusi', function () {
    return view('user.pages.forum-diskusi.index', ['title' => 'Forum Diskusi | Edulantas']);
});



// Halaman yang bisa diakses oleh User dan Admin (wajib login)
Route::middleware(['auth'])->group(function () {
    // Subpage Repositori
    Route::get('/request-item', [RequestItemController::class, 'index'])->name('request-item.index');
    Route::post('/request-item', [RequestItemController::class, 'store'])->name('request-items.store');

    // Subpage Forum Diskusi
    Route::get('/form-forum-diskusi', function () {
        return view('user.pages.forum-diskusi.subpage.form-forum-diskusi', ['title' => 'Form Forum Diskusi | Edulantas']);
    });

    Route::get('/detail-item/{type_id}', function ($type_id) {
        // Pisahkan prefix dan ID (contoh: "book-1" menjadi ["book", "1"])
        [$type, $id] = explode('-', $type_id);
    
        if ($type === 'book') {
            $item = DB::table('electronics_books')->where('id', $id)->first();
        } elseif ($type === 'video') {
            $item = DB::table('videos')->where('id', $id)->first();
        } else {
            abort(404); // Jika bukan book atau video, tampilkan 404
        }
    
        if (!$item) {
            abort(404);
        }
    
        return view('user.pages.repositori.subpage.detail-item', [
            'title' => 'Detail Item | Edulantas',
            'item' => $item,
            'type' => $type
        ]);
    });
    
});



// Halaman khusus Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin-statistik', function () {
        return view('admin.pages.statistik.index', ['title' => 'Admin Statistik | Edulantas']);
    });
    
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
    
    Route::get('/admin-forum-diskusi', function () {
        return view('admin.pages.forum-diskusi.index', ['title' => 'Admin Forum Diskusi | Edulantas']);
    });
});