@extends('auth.layouts.main')
@section('container')

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center relative" style="background-image: url('/img/background/bg-jr-gray.png');">
    <a href="javascript:void(0);" onclick="window.history.back();" class="absolute top-6 left-6 shadow-md bg-white p-2 rounded-full border border-gray-300 flex items-center gap-1 hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blueJR">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <span class="hidden md:inline text-sm text-blueJR font-medium">Back</span>
    </a>

    <div class="flex flex-col lg:flex-row h-full justify-center items-center max-w-sm lg:max-w-5xl gap-x-5 px-6 lg:px-0 mx-auto">
        <img class="hidden lg:block rounded-3xl border-2 border-blueJR w-3/5 lg:h-[26rem] shadow-lg" src="{{ asset('img/user/tentang-kami/tentang-kami-1.png') }}" alt="Login">
        
        <div class="w-full md:w-1/2 flex flex-col justify-center lg:h-[26rem] items-center p-6 md:p-10 bg-white border-2 border-blueJR rounded-3xl shadow-lg">
            <h1 class="text-xl font-semibold text-blueJR text-center">
                Sign in
                <span class="block w-16 h-[2px] bg-blueJR mx-auto mt-1"></span>
            </h1>
            <p class="text-center text-sm lg:text-base font-semibold mt-2 text-black"> 
                <span class="text-red-500">E</span>DUKASI <span class="text-green-600">L</span>ALU <span class="text-yellow-500">L</span>INTAS <br>
                Platform Digital Keselamatan Lalu Lintas
            </p>

            <form class="w-full mt-5 px-3 text-sm">
                <input type="email" placeholder="Email" class="text-sm w-full px-4 py-2 placeholder:text-gray-600 border border-gray-300 rounded-lg">
                <input type="password" placeholder="Password" class="text-sm w-full mt-3 placeholder:text-gray-600 px-4 py-2 border border-gray-300 rounded-lg">
                <button class="w-full mt-4 bg-blueJR text-white py-2 rounded-md">Sign in</button>
            </form>

            <div class="w-full mt-3 px-3 text-sm">
                <button class="w-full border border-gray-300 text-black py-2 text-sm rounded-md flex justify-center items-center gap-2 hover:bg-gray-100">
                    <img src="{{ asset('img/logo/icon-google.png') }}" alt="Google" class="w-5 h-5">
                    Sign in dengan Google
                </button>
            </div>

            <p class="mt-4 text-sm text-center text-gray-600">Belum memiliki akun? <br>
                <a href="/sign-up" class="text-blueJR underline text-xs font-semibold">Buat akun di sini</a>
            </p>
        </div>
    </div>
</div>

@endsection