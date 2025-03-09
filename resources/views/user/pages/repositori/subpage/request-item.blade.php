@extends('user.layouts.main')
@section('container')

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <div class="flex flex-col h-full justify-center items-center max-w-6xl lg:max-w-4xl mx-auto">
        <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
            REQUEST ITEM
        </h1>
        <form class="w-full space-y-6 mt-3 px-6 lg:px-12 flex flex-col justify-center items-center">
          
            <!-- Dropdown -->
            <div class="w-full flex items-center border border-black rounded-full px-5 py-3 lg:py-4 focus-within:ring-2 focus-within:ring-blue-400">
                <select class="w-full text-sm lg:text-base text-gray-700 text-center focus:outline-none border-none bg-transparent">
                    <option>Pilih Kategori</option>
                    <option value="1">Elektronik Buku</option>
                    <option value="2">Video Edukasi</option>
                </select>
                <span class="text-red-600 text-lg ml-2">*</span>
            </div>

            <!-- Input Text -->
            <div class="w-full flex items-center border border-black rounded-full px-5 py-3 lg:py-4 focus-within:ring-2 focus-within:ring-blue-400 mt-4">
                <input type="text" placeholder="Ketikkan Kata Kunci..." class="w-full text-sm text-center lg:text-base text-gray-700 focus:outline-none bg-transparent placeholder:text-gray-700 border-none">
                <span class="text-red-600 text-lg ml-2">*</span>
            </div>
                      
            <div class="w-full bg-white border border-black p-4 lg:p-6 rounded-3xl flex flex-col justify-center items-center">
                <!-- Tahun Publikasi -->
                <label class="font-semibold text-sm lg:text-base">Tahun Publikasi</label>
                <div class="flex flex-wrap justify-center text-xs lg:text-sm gap-2 lg:gap-4 mt-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tahun" value="2025"> <span>2025</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tahun" value="2024"> <span>2024</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tahun" value="2023"> <span>2023</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tahun" value="2022"> <span>2022</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tahun" value="2021"> <span>2021</span>
                    </label>
                </div>
            
                <!-- Kustom Tahun -->
                <div class="mt-5 w-full flex justify-center items-center gap-x-2">
                    <label class="block text-xs lg:text-sm font-medium">Kustom Tahun</label>
                    <input type="text" placeholder="Ketikkan Tahun" class="text-xs lg:text-sm text-center placeholder:text-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
          
          <!-- Tombol Cari -->
          <button type="submit" class="w-1/2 text-sm lg:text-base flex items-center justify-center gap-2 bg-blueJR text-white py-3 lg:py-4 border border-black rounded-full hover:bg-blue-600">
            Kirim Request <span><i class="fa-solid fa-sm lg:fa-lg fa-paper-plane"></i></span>
          </button>
        </form>
    </div>
</div>

{{-- Section 2 --}}
<div class="w-full mb-20 flex flex-col justify-center items-center">
    <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
        STATUS REQUEST
    </h1>

    {{-- Table --}}
    <div class="w-full px-6 lg:px-12 flex flex-col max-w-6xl lg:max-w-4xl">
        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] text-sm items-center justify-between border border-black rounded-lg p-3">
                <p>Cerdas Berlalu Lintas</p>
            </div>
            <div class="flex w-[15%] lg:w-[10%] bg-green-500 items-center justify-center rounded-lg p-3 border border-black">
                <p class="text-white text-center text-xs rounded">Berhasil Dikirim</p>
            </div>
            <button class="flex w-[5%] bg-green-500 items-center justify-center rounded-lg p-3 border border-black">
                <i class="fa-solid fa-eye text-white"></i>
            </button>
        </div>

        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] text-sm items-center justify-between border border-black rounded-lg p-3">
                <p>Rekayasa Lalu Lintas</p>
            </div>
            <div class="flex w-[15%] lg:w-[10%] bg-yellow-500 items-center justify-center rounded-lg p-3 border border-black">
                <p class="text-white text-center text-xs rounded">Diproses</p>
            </div>
            <button class="flex w-[5%] bg-yellow-500 items-center justify-center rounded-lg p-3 border border-black">
                <i class="fa-solid fa-eye-slash text-white"></i>
            </button>
        </div>

        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] text-sm items-center justify-between border border-black rounded-lg p-3">
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