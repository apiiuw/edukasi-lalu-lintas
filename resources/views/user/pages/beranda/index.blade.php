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

<div class="bg-white h-screen"></div>

@endsection