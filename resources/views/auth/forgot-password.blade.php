@extends('auth.layouts.main')
@section('container')

@if (session('status'))
    <div id="success-alert" class="fixed top-24 right-5 z-50 bg-green-50 border-s-4 border-green-500 p-4" role="alert" tabindex="-1">
        <div class="flex">
            <div class="shrink-0">
                <!-- Icon success -->
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-green-100 bg-green-200 text-green-800 dark:border-green-900 dark:bg-green-800 dark:text-green-400">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold">
                    Berhasil!
                </h3>
                <p class="text-sm text-gray-700">
                    {{ session('status') }}
                </p>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('success-alert')?.remove();
        }, 5000);
    </script>
@endif

@if ($errors->has('email'))
    <div id="error-alert" class="fixed top-24 right-5 z-50 bg-red-50 border-s-4 border-red-500 p-4" role="alert" tabindex="-1">
        <div class="flex">
            <div class="shrink-0">
                <!-- Icon error -->
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold">
                    Terjadi Kesalahan!
                </h3>
                <ul class="text-sm text-gray-700 mb-0">
                    @foreach ($errors->get('email') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('error-alert')?.remove();
        }, 5000);
    </script>
@endif

<div class="w-full px-6 h-screen bg-cover bg-center flex justify-center items-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <a href="javascript:void(0);" onclick="window.history.back();" class="absolute top-6 left-6 shadow-md bg-white p-2 rounded-full border border-gray-300 flex items-center gap-1 hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blueJR">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <span class="hidden md:inline text-sm text-blueJR font-medium">Back</span>
    </a>

    <div class="w-full max-w-sm lg:max-w-md bg-white border-2 border-blueJR rounded-3xl shadow-lg p-6">
        <h1 class="text-xl font-semibold text-blueJR text-center">
            Lupa Password
            <span class="block w-16 h-[2px] bg-blueJR mx-auto mt-1"></span>
        </h1>

        <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
            @csrf
            <input name="email" type="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required autofocus class="placeholder:text-gray-600 w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
            <button type="submit" class="w-full bg-blueJR text-white py-2 rounded-md">Kirim Link Reset</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-blueJR underline text-sm">Kembali ke sign in</a>
        </div>
    </div>
</div>

@endsection
