@extends('user.layouts.main')
@section('container')

{{-- Item Elektronik Buku --}}
<div class="pt-28 px-4">
    <div class="w-full h-full bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
        <div class="flex flex-col items-center mb-20">
            <h1 class="text-lg md:text-xl w-52 lg:w-72 text-blueJR font-semibold text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
                Desiminasi Kurikulum Merdeka Pendidikan Lalu Lintas SMP Kelas VII
            </h1>

            <!-- Card -->
            <div class="flex flex-col px-4 max-w-4xl">
                <div class="flex items-center justify-between bg-blueJR mt-6 w-full text-white border-t border-l border-r border-black rounded-t-lg px-4 py-2">
                    <span>Buku Elektronik</span>
                    <span>2023</span>
                </div>
                <div class="bg-white shadow-md rounded-b-lg p-4 w-full border-b border-l border-r border-black">
                    <div class="p-4 text-sm text-gray-700">
                        <p>
                            Buku Diseminasi Kurikulum Pendidikan Lalu Lintas SMP Kelas VII merupakan panduan penting yang mengajarkan peserta didik nilai-nilai disiplin, etika, dan norma berlalu lintas berdasarkan Kurikulum Merdeka. Dengan pendekatan yang terintegrasi dalam pembelajaran, buku ini membantu menciptakan generasi yang sadar akan keselamatan dan budaya tertib berlalu lintas, mendukung terciptanya lingkungan lalu lintas yang aman, nyaman, dan bertanggung jawab.                        </p>
                        <p class="mt-2"><strong>Kata Kunci:</strong> Pendidikan lalu lintas, SMP Kelas VII, Kurikulum Merdeka</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-4">
                <button class="bg-blueJR text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <span><i class="fa-solid fa-eye"></i></span> Lihat Detail
                </button>
                <button class="bg-blueJR text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <span><i class="fa-regular fa-circle-down"></i></span> Download
                </button>
            </div>

            <!-- Cover Image -->
            <div class="mt-6 w-full lg:w-4/12 px-2">
                <img src="{{ asset('img/user/repositori/books/ex-book-3.png') }}" alt="Buku Pendidikan Lalu Lintas" class="rounded-t-md shadow-lg w-full">
                <div class="flex justify-between items-center py-3 px-3 w-full bg-gray-200 rounded-b-md">
                    <a href="#" class="bg-gray-400 px-4 py-2 rounded-md"><span><i class="fa-solid fa-arrow-left pr-1"></i></span> Kembali</a>
                    <span class="text-sm text-gray-600">Halaman 1 dari 54</span>
                    <a href="#" class="bg-blueJR text-white px-4 py-2 rounded-md">Lanjut <span><i class="fa-solid fa-arrow-right pl-1"></i></span></a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="h-40"></div>

{{-- Item Video Edukasi --}}
<div class="pt-28 px-4">
    <div class="w-full h-full bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
        <div class="flex flex-col items-center mb-20">
            <h1 class="text-lg md:text-xl w-52 lg:w-72 text-red-500 font-semibold text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-text-red-500 after:mx-auto after:mt-1">
                [Motion Grafis] Mari Patuhi Lalu Lintas, Keselamatan No.1
            </h1>

            <!-- Card -->
            <div class="flex flex-col px-4 max-w-4xl">
                <div class="flex items-center justify-between bg-red-500 mt-6 w-full text-white border-t border-l border-r border-black rounded-t-lg px-4 py-2">
                    <span>Video Edukasi</span>
                    <span>2019</span>
                </div>
                <div class="bg-white shadow-md rounded-b-lg p-4 w-full border-b border-l border-r border-black">
                    <div class="p-4 text-sm text-gray-700">
                        <p>Kecelakaan lalu lintas merupakan penyebab kematian nomor 2 terbesar di dunia. Oleh karenanya dalam sebuah acara kampanye keselamatan berlalu lintas medio Agustus 2018, Menteri Perhubungan (Menhub) Budi Karya Sumadi berpesan kepada masyarakat untuk mengurangi kecepatan di jalan saat berkendara karena dapat mengurangi angka kecelakaan lalu lintas yang fatal.</p>
                        <p class="mt-2"><strong>Kata Kunci:</strong> Pendidikan lalu lintas, SMP Kelas VII, Kurikulum Merdeka</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-4">
                <a href="https://youtu.be/Yo18MupGsa8?si=oIiWRsfTIXhKgQn6" target="_blank" class="bg-red-500 text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <span><i class="fa-solid fa-eye"></i></span> Tonton di Youtube
                </a>
            </div>

            <!-- Cover Image -->
            <iframe 
            class="mt-6 w-full max-w-2xl h-56 lg:h-96 rounded-md shadow-md" 
            src="https://www.youtube-nocookie.com/embed/Yo18MupGsa8?si=1NwGC4ROKW6uk8QZ&amp;controls=0" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
            </iframe>    

        </div>
    </div>
</div>

@endsection