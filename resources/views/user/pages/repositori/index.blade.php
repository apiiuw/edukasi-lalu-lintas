@extends('user.layouts.main')

@section('container')

<div class="mt-24 lg:mt-40 flex flex-col justify-center items-center px-6 lg:px-0">
    <div class="w-full max-w-5xl">
        <!-- Search Bar -->
        <div class="flex items-center justify-center rounded-full p-2 shadow-md bg-white mb-3 border border-black">
            <select class="p-2 text-xs lg:text-sm rounded-full border text-center border-gray-300 outline-none">
                <option>Pilih Kategori</option>
                <option>Elektronik Buku</option>
                <option>Video Edukasi</option>
            </select>
            <input type="text" class="flex-grow p-2 outline-none border-none text-sm lg:text-base text-black placeholder:text-gray-700" placeholder="Ketikkan Kata Kunci...">
            <button class="p-2 bg-blueJR px-4 text-white rounded-full">
                <i class="fa-solid fa-xs lg:fa-lg fa-magnifying-glass"></i>
            </button>
        </div>

        <!-- Tahun Publikasi -->
        <div class="border border-black p-4 lg:p-6 shadow-md rounded-3xl flex flex-col justify-center items-center">
            <label class="font-semibold text-sm lg:text-base">Tahun Publikasi</label>
            <div class="flex flex-wrap justify-center text-xs lg:text-base gap-2 lg:gap-5 mt-4">
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
            <div class="flex space-x-2 items-center mt-1">
                <input type="text" placeholder="Tahun Awal" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <span class="text-gray-500">-</span>
                <input type="text" placeholder="Tahun Akhir" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3 gap-x-1 gap-y-2 lg:gap-x-4 lg:gap-y-4 max-w-5xl mx-auto mt-6 place-items-center px-6 lg:px-0">

  <!-- Books Card 1 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/books/ex-book-1.png') }}" alt="Book 1" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-blueJR flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Desiminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XII
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2023</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Baca Selengkapnya
      </button>
    </div>
  </div>

  <!-- Books Card 2 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/books/ex-book-2.png') }}" alt="Book 2" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-blueJR flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Desiminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XI
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2023</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Baca Selengkapnya
      </button>
    </div>
  </div>

  <!-- Books Card 3 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/books/ex-book-3.png') }}" alt="Book 3" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-blueJR flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Desiminasi Kurikulum Pendidikan Lalu Lintas SMP Kelas VII
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2023</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Baca Selengkapnya
      </button>
    </div>
  </div>

  <!-- Video Card 1 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/video/ex-vid-1.jpg') }}" alt="Video 1" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-red-500 flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
        Video Edukasi
      </h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        [Motion Grafis] Mari Patuhi Lalu Lintas, Keselamatan No.1
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2019</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Tonton Sekarang
      </button>
    </div>
  </div>

  <!-- Video Card 2 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/video/ex-vid-2.jpg') }}" alt="Video 2" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-red-500 flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
        Video Edukasi
      </h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Sosialisasi Keselamatan Lalu Lintas
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2021</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Tonton Sekarang
      </button>
    </div>
  </div>

  <!-- Video Card 3 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/video/ex-vid-3.jpg') }}" alt="Video 3" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-red-500 flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
        Video Edukasi
      </h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Etika dalam Berkendara agar aman di Jalan Raya
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2021</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Tonton Sekarang
      </button>
    </div>
  </div>

  <!-- Books Card 1 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/books/ex-book-1.png') }}" alt="Book 1" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-blueJR flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Desiminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XII
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2023</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Baca Selengkapnya
      </button>
    </div>
  </div>

  <!-- Books Card 2 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/books/ex-book-2.png') }}" alt="Book 2" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-blueJR flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Desiminasi Kurikulum Pendidikan Lalu Lintas SMA Kelas XI
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2023</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Baca Selengkapnya
      </button>
    </div>
  </div>

  <!-- Books Card 3 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/books/ex-book-3.png') }}" alt="Book 3" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-blueJR flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">Buku Elektronik</h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Desiminasi Kurikulum Pendidikan Lalu Lintas SMP Kelas VII
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2023</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Baca Selengkapnya
      </button>
    </div>
  </div>

  <!-- Video Card 1 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/video/ex-vid-1.jpg') }}" alt="Video 1" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-red-500 flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
        Video Edukasi
      </h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        [Motion Grafis] Mari Patuhi Lalu Lintas, Keselamatan No.1
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2019</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Tonton Sekarang
      </button>
    </div>
  </div>

  <!-- Video Card 2 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/video/ex-vid-2.jpg') }}" alt="Video 2" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-red-500 flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
        Video Edukasi
      </h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Sosialisasi Keselamatan Lalu Lintas
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2021</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Tonton Sekarang
      </button>
    </div>
  </div>

  <!-- Video Card 3 -->
  <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
    <img src="{{ asset('img/user/repositori/video/ex-vid-3.jpg') }}" alt="Video 3" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
    <div class="bg-red-500 flex justify-center items-center py-2 w-full">
      <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
        Video Edukasi
      </h3>
    </div>
    <div class="flex flex-col px-4 py-4 flex-grow w-full">
      <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
        Etika dalam Berkendara agar aman di Jalan Raya
      </p>
    </div>
    <div class="mt-auto flex flex-col items-center w-full pb-4">
      <span class="text-gray-500 text-xs mb-2">2021</span>
      <button class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
        Tonton Sekarang
      </button>
    </div>
  </div>

</div>

<!-- Pagination -->
<div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
    <button class="border px-4 py-2 rounded-lg text-gray-500 bg-white">Sebelumnya</button>
    <button class="border px-4 py-2 rounded-lg bg-gray-200">1</button>
    <button class="border px-4 py-2 rounded-lg bg-white">2</button>
    <button class="border px-4 py-2 rounded-lg bg-white">3</button>
    <button class="border px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</button>
</div>

<div class="flex flex-col justify-center items-center my-20 gap-y-4">
    <h1 class="text-sm lg:text-base">Belum menemukan item yang anda inginkan?</h1>
    <a href="/request-item" class="text-sm lg:text-base bg-blueJR px-10 py-2 text-white rounded-xl border border-black">Request Item</a>
</div>

@endsection
