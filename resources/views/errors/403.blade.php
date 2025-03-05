@extends('user.layouts.main')

@section('container')

<div class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <h1 class="text-7xl font-extrabold text-gray-800">ERROR | 403</h1>
    <p class="text-xl text-gray-600 mt-4">Oops! Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-blueJR text-white rounded-lg">
        Kembali ke Beranda
    </a>
</div>

@endsection
