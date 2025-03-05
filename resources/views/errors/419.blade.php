@extends('user.layouts.main')

@section('container')

<div class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <h1 class="text-6xl font-bold text-yellow-600">ERROR | 419</h1>
    <p class="text-lg text-gray-700 mt-4">Sesi Anda telah habis. Silakan refresh atau login kembali.</p>
    <a href="{{ url('/login') }}" class="mt-6 px-6 py-3 bg-blueJR text-white rounded-lg">
        Login Ulang
    </a>
</div>

@endsection