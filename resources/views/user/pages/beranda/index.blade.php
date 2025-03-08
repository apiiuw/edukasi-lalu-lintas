@extends('user.layouts.main')
@section('container')

<!-- Slider -->
<div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-5 border border-gray-400 rounded-full cursor-pointer",
    "isAutoPlay": true
  }' class="relative">
  <div class="hs-carousel relative overflow-hidden w-full h-screen bg-white">
    <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">

      <div class="hs-carousel-slide">
        <div class="flex justify-center bg-cover bg-center h-full p-6" style="background-image: url('/img/user/beranda/carousel-1.png');">
            <span class="self-center font-semibold text-center text-3xl lg:text-4xl text-white transition duration-700 leading-none">
                <span class="text-red-600">E</span>dukasi 
                <span class="text-yellow-500">L</span>alu 
                <span class="text-green-500">L</span>intas
                <br>
                <span class="font-medium text-sm lg:text-base">Platform Digital Keselamatan Lalu Lintas</span>
            </span>            
        </div>
      </div>
      
      <div class="hs-carousel-slide">
        <div class="flex justify-center bg-cover bg-center h-full p-6 lg:px-64" style="background-image: url('/img/user/beranda/carousel-2.png');">
            <span class="self-center font-light text-center text-sm lg:text-xl text-white transition duration-700 leading-none">
                Menurut Badan Pusat Statistik (BPS), total kecelakaan lalu lintas tahun 2022 sebanyak <span class="text-red-600">139.258 kasus</span>, sedangkan pada tahun 2023 meningkat menjadi <span class="text-red-600">146.854 kasus</span>. Ini membuktikan bahwa kecelakaan lalu lintas meningkat hingga <span class="text-red-600">5,46%</span>.
                <br>
                <br>
                Melalui <span class="font-semibold"><span class="text-red-600">e</span>du<span class="text-yellow-500">l</span>alu<span class="text-green-500">l</span>intas.com</span>, mari bersama tingkatkan kesadaran dan pengetahuan lalu lintas!
                <br>
                <span class="font-semibold">#KeselamatanBersama</span>
            </span>            
        </div>
      </div>

      <div class="hs-carousel-slide">
        <div class="flex justify-center bg-cover bg-center h-full p-6 lg:px-64" style="background-image: url('/img/user/beranda/carousel-3.png');">
            <span class="self-center font-light text-center text-sm lg:text-xl text-white transition duration-700 leading-none">
                Jelajahi, baca online, atau unduh buku pilihanmu sekarang dan tingkatkan wawasan lalu lintasmu!
            </span>            
        </div>
      </div>

      <div class="hs-carousel-slide">
        <div class="flex justify-center bg-cover bg-center h-full p-6 lg:px-64" style="background-image: url('/img/user/beranda/carousel-4.png');">
            <span class="self-center font-light text-center text-sm lg:text-xl text-white transition duration-700 leading-none">
                Tonton video edukasi lalu lintas yang menarik dan mudah dipahami!
            </span>            
        </div>
      </div>

      <div class="hs-carousel-slide">
        <div class="flex justify-center bg-cover bg-center h-full p-6 lg:px-64" style="background-image: url('/img/user/beranda/carousel-5.png');">
            <span class="self-center font-light text-center text-sm lg:text-xl text-white transition duration-700 leading-none">
                Tingkatkan kesadaran berlalu lintas bersama kami
                <br>
                <span class="font-semibold"><span class="text-red-600">e</span>du<span class="text-yellow-500">l</span>alu<span class="text-green-500">l</span>intas.com</span>.
            </span>            
        </div>
      </div>

    </div>
  </div>

  <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-11.5 h-full text-white hover:bg-white/10 focus:outline-hidden focus:bg-white/10 rounded-s-lg">
    <span class="text-2xl" aria-hidden="true">
      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m15 18-6-6 6-6"></path>
      </svg>
    </span>
    <span class="sr-only">Previous</span>
  </button>
  <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-11.5 h-full text-white hover:bg-white/10 focus:outline-hidden focus:bg-white/10 rounded-e-lg">
    <span class="sr-only">Next</span>
    <span class="text-2xl" aria-hidden="true">
      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6"></path>
      </svg>
    </span>
  </button>

</div>
<!-- End Slider -->

<div class="bg-white h-full py-20 pb-36 flex flex-col justify-center items-center">
  {{-- Section 1 --}}
  <div class="flex flex-col justify-center items-center max-w-6xl lg:max-w-4xl mx-auto">
    <h1 class="text-base lg:text-xl text-black font-semibold mb-4 text-center">
      Mulai Jelajahi Pencarianmu!
    </h1>
    <form class="w-full space-y-6 mt-3 px-6 lg:px-12">
      
      <!-- Input Text -->
      <input type="text" placeholder="Ketikkan Kata Kunci..." class="w-full text-sm lg:text-base py-3 lg:py-4 border border-black rounded-full text-center placeholder:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
      
      <!-- Dropdown -->
      <select class="w-full text-sm lg:text-base py-3 lg:py-4 border border-black rounded-full text-center text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option>Pilih Kategori</option>
        <option value="1">Elektronik Buku</option>
        <option value="2">Video Edukasi</option>
      </select>
      
      <!-- Tahun Publikasi -->
      <div class="border border-black p-4 lg:p-6 rounded-3xl flex flex-col justify-center items-center">
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
        <div class="mt-5 w-full">
          <label class="block text-xs lg:text-sm font-medium">Kustom Tahun</label>
          <div class="flex space-x-2 mt-1">
            <input type="text" placeholder="Tahun Awal" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <span class="text-gray-500">-</span>
            <input type="text" placeholder="Tahun Akhir" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
          </div>
        </div>
      </div>
      
      <!-- Tombol Cari -->
      <button type="submit" class="w-full text-sm lg:text-base flex items-center justify-center gap-2 bg-blue-500 text-white py-3 lg:py-4 border border-black rounded-full hover:bg-blue-600">
        Mulai Mencari <span><i class="fa-solid fa-sm lg:fa-lg fa-magnifying-glass"></i></span>
      </button>
    </form>
  </div>
  

  {{-- Section 2 --}}
  <div class="flex flex-col justify-center items-center mt-40 px-6">
    <div class="rounded-3xl shadow-lg border border-black bg-white">
      <div class="flex justify-center items-center py-2 px-3">
        <h2 class="text-xs lg:text-lg font-semibold text-center">
          Mengapa Platform Digital Edukasi Lalu Lintas Sangat Dibutuhkan?
        </h2>
      </div>
      <div class="w-full max-w-2xl overflow-hidden">
          <iframe src="https://drive.google.com/file/d/1K-EzQVLFgnl_ztsEudNZm0XXf6zItXN-/preview" 
                  allow="autoplay"
                  class="w-full h-[11.5rem] lg:h-[18.4rem] rounded-b-3xl">
          </iframe>
      </div>
    </div>
  </div>

  {{-- Section 3 --}}
  <div class="flex flex-col justify-center items-center mt-40 px-6">
    <div class="flex justify-center items-center py-2 px-3">
      <h2 class="text-base lg:text-xl font-semibold text-center">
        Top 3 Trending Books
      </h2>
    </div>
    
    <div class="flex flex-wrap justify-between gap-x-1 gap-y-2 lg:gap-x-4 lg:gap-y-4 max-w-5xl mx-auto mt-6">
      <!-- Card 1 -->
      <div class="bg-white rounded-xl shadow-lg flex flex-col items-center w-[48%] lg:w-[32%] border border-black lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
        <img src="{{ asset('img/user/beranda/top-3-books/ex-book-1.png') }}" alt="Book 1" class="w-full h-full object-cover rounded-t-xl">
        <div class="bg-blueJR flex justify-center items-center py-2 w-full">
          <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
        </div>
        <div class="flex flex-col justify-center items-center px-4 py-4">
          <p class="text-center text-xs lg:text-sm">Desiminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XII</p>
          <span class="text-gray-500 text-xs">2023</span>
          <button class="mt-2 bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">Baca Selengkapnya</button>
        </div>
      </div>
    
      <!-- Card 2 -->
      <div class="bg-white rounded-xl shadow-lg flex flex-col items-center w-[48%] lg:w-[32%] border border-black lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
        <img src="{{ asset('img/user/beranda/top-3-books/ex-book-2.png') }}" alt="Book 1" class="w-full h-full object-cover rounded-t-xl">
        <div class="bg-blueJR flex justify-center items-center py-2 w-full">
          <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
        </div>
        <div class="flex flex-col justify-center items-center px-4 py-4">
          <p class="text-center text-xs lg:text-sm">Desiminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XI</p>
          <span class="text-gray-500 text-xs">2023</span>
          <button class="mt-2 bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">Baca Selengkapnya</button>
        </div>
      </div>
    
      <!-- Card 3 -->
      <div class="bg-white rounded-xl shadow-lg flex flex-col items-center w-[48%] lg:w-[32%] border border-black mx-auto lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
        <img src="{{ asset('img/user/beranda/top-3-books/ex-book-3.png') }}" alt="Book 1" class="w-full h-full object-cover rounded-t-xl">
        <div class="bg-blueJR flex justify-center items-center py-2 w-full">
          <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
        </div>
        <div class="flex flex-col justify-center items-center px-4 py-4">
          <p class="text-center text-xs lg:text-sm">Desiminasi Kurikulum Pendidikan Lalu Lintas SMP Kelas VII</p>
          <span class="text-gray-500 text-xs">2023</span>
          <button class="mt-2 bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">Baca Selengkapnya</button>
        </div>
      </div>

    </div>
    
    
  </div>
  
</div>


@endsection