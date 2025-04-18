@extends('user.layouts.main')

@section('container')

<div class="mt-24 lg:mt-40 flex flex-col justify-center items-center px-6 lg:px-0">
    <div class="w-full max-w-5xl">
        <!-- Search Bar -->
        <form action="{{ route('search.index') }}" method="GET">
          <div class="flex items-center justify-center rounded-full p-2 shadow-md bg-white mb-3 border border-black">
              <select name="kategori" class="p-2 text-xs lg:text-sm rounded-full border text-center border-gray-300 outline-none">
                  <option value="">Pilih Kategori</option>
                  <option value="Elektronik Buku">Elektronik Buku</option>
                  <option value="Video Edukasi">Video Edukasi</option>
              </select>
              <input type="text" name="search" class="flex-grow p-2 outline-none border-none text-sm lg:text-base text-black placeholder:text-gray-700" placeholder="Ketikkan Kata Kunci...">
              <button type="submit" class="p-2 bg-blueJR px-4 text-white rounded-full">
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
                      <input type="text" name="tahun_awal" placeholder="Tahun Awal" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg">
                      <span class="text-gray-500">-</span>
                      <input type="text" name="tahun_akhir" placeholder="Tahun Akhir" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg">
                  </div>
              </div>
          </div>
      </form>      
    </div>
</div>

@if ($items->isEmpty())
  <p class="text-gray-500 text-sm lg:text-base text-center mt-10">Tidak ada hasil yang ditemukan.</p>
@else
@if (request()->has('search'))
<p class="text-gray-500 text-sm lg:text-base text-center mt-4">Total item yang ditemukan: {{ $totalItemSearch }}</p>
@endif
<div class="grid grid-cols-2 sm:grid-cols-3 gap-x-1 gap-y-2 lg:gap-x-4 lg:gap-y-4 max-w-5xl mx-auto mt-6 place-items-center px-6 lg:px-0">
  @foreach ($items as $item)
    <div class="bg-white rounded-xl w-44 lg:w-full shadow-lg flex flex-col items-center border border-black h-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
      <img src="{{ Storage::url($item['data']->cover) }}" alt="{{ $item['data']->judul }}" class="w-full h-52 lg:h-80 object-cover rounded-t-xl">
      
      <div class="{{ $item['type'] == 'book' ? 'bg-blueJR' : 'bg-red-600' }} flex justify-center items-center py-2 w-full">
        <h3 class="text-white text-sm lg:text-base font-medium lg:font-semibold">
          {{ $item['type'] == 'book' ? 'Buku Elektronik' : 'Video Edukasi' }}
        </h3>
      </div>      
      
      <div class="flex flex-col px-4 py-4 flex-grow w-full">
        <p class="text-center text-xs lg:text-sm line-clamp-2 min-h-[2rem] lg:min-h-[2.5rem]">
          {{ $item['data']->judul }}
        </p>
      </div>
      
      <div class="mt-auto flex flex-col items-center w-full pb-4">
        <span class="text-gray-500 text-xs mb-2">{{ $item['data']->tahun_rilis }}</span>

        @if ($item['type'] == 'book')
          <a href="{{ url('/detail-item/book-' . $item['data']->id) }}" 
            class="bg-blueJR text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
            Baca Selengkapnya
          </a>
        @else
          <a href="{{ url('/detail-item/video-' . $item['data']->id) }}" 
            class="bg-red-600 text-xs lg:text-sm border border-black text-white py-2 px-3 rounded-md">
            Tonton Sekarang
          </a>
        @endif
              
      </div>
    </div>
  @endforeach
</div>
@endif

<!-- Pagination -->
<div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
  @if ($items->currentPage() > 1)
      <a href="{{ $items->previousPageUrl() }}" class="border px-4 py-2 rounded-lg text-gray-500 bg-white">Sebelumnya</a>
  @else
      <span class="border px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Sebelumnya</span>
  @endif

  @for ($i = 1; $i <= $items->lastPage(); $i++)
      <a href="{{ $items->url($i) }}" class="border px-4 py-2 rounded-lg {{ $items->currentPage() == $i ? 'bg-gray-200' : 'bg-white' }}">
          {{ $i }}
      </a>
  @endfor

  @if ($items->hasMorePages())
      <a href="{{ $items->nextPageUrl() }}" class="border px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</a>
  @else
      <span class="border px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Selanjutnya</span>
  @endif
</div>



<div class="flex flex-col justify-center items-center my-20 gap-y-4">
    <h1 class="text-sm lg:text-base">Belum menemukan item yang anda inginkan?</h1>
    <a href="/request-item" class="text-sm lg:text-base bg-blueJR px-10 py-2 text-white rounded-xl border border-black">Request Item</a>
</div>

@endsection
