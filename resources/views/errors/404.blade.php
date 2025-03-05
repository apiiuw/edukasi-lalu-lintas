{{-- resources/views/errors/404.blade.php --}}
@extends('user.layouts.main')

@section('container')

<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800">ERROR | 404</h1>
        <p class="text-xl text-gray-600 mt-4">Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-blueJR text-white rounded-lg">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
