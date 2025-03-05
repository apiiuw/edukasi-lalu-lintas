@extends('user.layouts.main')

@section('container')

<div class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <h1 class="text-9xl font-extrabold text-black">ERROR | 500</h1>
    <p class="text-xl text-gray-600 mt-4">Oops! Terjadi kesalahan pada server kami.</p>
    <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-red-500 text-white rounded-lg">
        Kembali ke Beranda
    </a>
</div>

@endsection
