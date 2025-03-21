@extends('auth.layouts.main')
@section('container')
<div class="flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('password.update') }}" class="w-full max-w-sm bg-white p-6 rounded shadow">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h2 class="text-xl mb-4 text-center font-bold text-blueJR">Reset Password</h2>
        <input type="email" name="email" placeholder="Email" required class="w-full mb-3 p-2 border rounded">
        <input type="password" name="password" placeholder="Password Baru" required class="w-full mb-3 p-2 border rounded">
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required class="w-full mb-3 p-2 border rounded">
        <button type="submit" class="w-full bg-blueJR text-white py-2 rounded">Reset Password</button>
    </form>
</div>
@endsection
