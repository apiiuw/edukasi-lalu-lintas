@extends('user.layouts.main')
@section('container')

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <div class="flex flex-col h-full justify-center items-center max-w-6xl lg:max-w-4xl mx-auto">
        <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
            FORM FORUM DISKUSI
        </h1>
        <form class="w-full space-y-6 mt-3 px-6 lg:px-12 flex flex-col justify-center items-center">
            
            <!-- Input Text -->
            <div class="relative w-full">
                <textarea placeholder="Ketikkan pertanyaan..." required
                    class="w-full lg:h-44 text-sm lg:text-base px-5 py-4 border border-black rounded-2xl text-start placeholder:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"></textarea>
                <span class="absolute right-4 top-3 text-red-600 text-lg">*</span>
            </div>            
                      
          <!-- Tombol Cari -->
          <button type="submit" class="w-1/2 text-sm lg:text-base flex items-center justify-center gap-2 bg-blueJR text-white py-3 lg:py-4 border border-black rounded-full">
            Kirim Pertanyaan 
          </button>
        </form>
    </div>
</div>

{{-- Section 2 --}}
<div class="w-full mb-20 flex flex-col justify-center items-center">
    <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
        STATUS PERTANYAAN
    </h1>

    {{-- Table --}}
    <div class="w-full px-6 lg:px-12 flex flex-col max-w-6xl lg:max-w-4xl">
        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] items-center text-sm justify-between border border-black rounded-lg p-3">
                <p>(Example) Bagaimana cara request buku?</p>
            </div>
            <div class="flex w-[15%] lg:w-[10%] bg-green-500 items-center justify-center rounded-lg p-3 border border-black">
                <p class="text-white text-center text-xs rounded">Berhasil Dikirim</p>
            </div>
            <button class="flex w-[5%] bg-green-500 items-center justify-center rounded-lg p-3 border border-black">
                <i class="fa-solid fa-eye text-white"></i>
            </button>
        </div>

        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] items-center text-sm justify-between border border-black rounded-lg p-3">
                <p>(Example) Bagaimana cara mengendarai motor?</p>
            </div>
            <div class="flex w-[15%] lg:w-[10%] bg-yellow-500 items-center justify-center rounded-lg p-3 border border-black">
                <p class="text-white text-center text-xs rounded">Diproses</p>
            </div>
            <button class="flex w-[5%] bg-yellow-500 items-center justify-center rounded-lg p-3 border border-black">
                <i class="fa-solid fa-eye-slash text-white"></i>
            </button>
        </div>

        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] items-center text-sm justify-between border border-black rounded-lg p-3">
                <p>Pendidikan Disiplin Berlalu Lintas</p>
            </div>
            <div class="flex w-[15%] lg:w-[10%] bg-red-500 items-center justify-center rounded-lg p-3 border border-black">
                <p class="text-white text-center text-xs rounded">Ditolak</p>
            </div>
            <button class="flex w-[5%] bg-red-500 items-center justify-center rounded-lg p-3 border border-black">
                <i class="fa-solid fa-eye-slash text-white"></i>
            </button>
        </div>
    </div>
</div>


@endsection