@extends('admin.layouts.main')
@section('container')

@if (session('success'))
    <div id="success-alert" class="fixed top-24 right-5 bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 shadow-lg z-50">
        <div class="flex">
            <div class="shrink-0">
                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </span>
            </div>
            <div class="ms-3">
                <h3 class="text-xs lg:text-sm text-gray-800 font-semibold">
                    Berhasil!
                </h3>
                <p class="text-xs lg:text-sm text-gray-700">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    </div>

    <script>
        // Hilangkan alert setelah 5 detik
        setTimeout(() => {
            document.getElementById('success-alert')?.remove();
        }, 5000);
    </script>
@endif

<div class="p-4 lg:ml-64 bg-gray-200">
    <div class="mt-24 lg:mt-32 flex flex-col justify-center items-center px-0 lg:px-0 pb-10">

        <div class="w-full max-w-5xl">

            <div class="flex flex-col md:flex-row gap-4 md:gap-10 items-center justify-center mb-3">
                <!-- Kotak Total Buku -->
                <div class="flex items-center justify-between w-full md:w-96 p-4 rounded-3xl shadow-md bg-white border border-black">
                    <div>
                        <p class="text-sm text-gray-500">Total Item Buku</p>
                        <h2 class="text-xl font-semibold">{{ $totalBooks }}</h2>
                    </div>
                    <a href="/admin-add-books" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold text-xl pb-1 w-10 h-10 flex items-center justify-center rounded-full">
                        +
                    </a>
                </div>
            
                <!-- Kotak Total Video -->
                <div class="flex items-center justify-between w-full md:w-96 p-4 rounded-3xl shadow-md bg-white border border-black">
                    <div>
                        <p class="text-sm text-gray-500">Total Item Video</p>
                        <h2 class="text-xl font-semibold">{{ $totalVideos }}</h2>
                    </div>
                    <a href="/admin-add-videos" class="ml-4 bg-red-500 hover:bg-red-600 text-white font-bold text-xl pb-1 w-10 h-10 flex items-center justify-center rounded-full">
                        +
                    </a>
                </div>
            
                <!-- Kotak Total Semua Item -->
                <div class="w-full md:w-96 p-4 rounded-3xl shadow-md bg-white border border-black">
                    <p class="text-sm text-gray-500">Total Semua Item</p>
                    <h2 class="text-xl font-semibold">{{ $totalItems }}</h2>
                </div>
            </div>   

            <!-- Search Bar -->
            <form action="{{ route('item.search') }}" method="GET">
                <div class="flex items-center justify-center rounded-full p-2 shadow-md bg-white mb-3 border border-black">
                    <select name="kategori" class="p-2 text-xs lg:text-sm rounded-full border text-center border-gray-300 outline-none">
                        <option value="">Pilih Kategori</option>
                        <option value="Elektronik Buku">Elektronik Buku</option>
                        <option value="Video Edukasi">Video Edukasi</option>
                    </select>
                    <input name="search" type="text" class="flex-grow p-2 outline-none border-none text-sm lg:text-base text-black placeholder:text-gray-700" placeholder="Ketikkan Kata Kunci...">
                    <button type="submit" class="p-2 bg-blueJR px-4 text-white rounded-full">
                        <i class="fa-solid fa-xs lg:fa-lg fa-magnifying-glass"></i>
                    </button>
                </div>
        
                <!-- Tahun Publikasi -->
                <div class="border bg-white border-black p-4 lg:p-6 shadow-md rounded-3xl flex flex-col justify-center items-center">
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
                        <input type="text" name="tahun_awal" placeholder="Tahun Awal" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <span class="text-gray-500">-</span>
                        <input type="text" name="tahun_akhir" placeholder="Tahun Akhir" class="w-1/2 text-xs lg:text-sm text-center px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    </div>
                </div>
            </form>
        </div>

        @if ($items->isEmpty())
            <p class="text-gray-500 text-sm lg:text-base text-center mt-10">Tidak ada hasil yang ditemukan.</p>
        @else
        @if (request()->has('search'))
            <p class="text-gray-500 text-sm lg:text-base text-center mt-4">Total item yang ditemukan: {{ $totalItemSearch }}</p>
        @endif
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-1 gap-y-2 lg:gap-x-4 lg:gap-y-4 max-w-5xl mx-auto mt-6 place-items-center">
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
                
                <div class="mt-auto flex flex-col items-center w-full pb-4 px-2 lg:px-16">
                  <span class="text-gray-500 text-xs mb-2">{{ $item['data']->tahun_rilis }}</span>
          
                  @if ($item['type'] == 'book')
                    <a href="{{ url('/detail-item/book-' . $item['data']->id) }}" 
                      class="bg-blueJR text-xs w-full text-center lg:text-sm border border-black text-white py-2 px-3 rounded-md">
                      Baca Selengkapnya
                    </a>
                  @else
                    <a href="{{ url('/detail-item/video-' . $item['data']->id) }}" 
                      class="bg-blueJR text-xs w-full text-center lg:text-sm border border-black text-white py-2 px-3 rounded-md">
                      Tonton Sekarang
                    </a>
                  @endif

                  <a href="{{ url($item['type'] == 'book' ? '/admin-edit-books/' . $item['data']->id : '/admin-edit-videos/' . $item['data']->id) }}" 
                    class="bg-yellow-500 text-xs w-full lg:text-sm border text-center border-black text-white py-2 px-3 mt-2 rounded-md">
                    Edit Item
                  </a>                  

                  <!-- Tombol Hapus dengan Konfirmasi -->
                  <form class="w-full" action="{{ $item['type'] == 'book' ? route('admin.delete.book', $item['data']->id) : route('admin.delete.video', $item['data']->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-600 w-full text-xs lg:text-sm border text-center border-black text-white py-2 px-3 mt-2 rounded-md">
                          Hapus Item
                      </button>
                  </form>
                  
                  <script>
                      function confirmDelete(event) {
                          event.preventDefault(); // Mencegah penghapusan langsung
                          if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
                              event.target.submit(); // Submit jika dikonfirmasi
                          }
                      }
                  </script>
                        
                </div>
              </div>
            @endforeach
        </div>
        @endif

        <!-- Pagination -->
        <div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
            @if ($items->currentPage() > 1)
                <a href="{{ $items->previousPageUrl() }}" class="border border-black px-4 py-2 rounded-lg text-gray-500 bg-white">Sebelumnya</a>
            @else
                <span class="border border-black px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Sebelumnya</span>
            @endif
        
            @for ($i = 1; $i <= $items->lastPage(); $i++)
                <a href="{{ $items->url($i) }}" class="border px-4 py-2 rounded-lg border-black {{ $items->currentPage() == $i ? 'bg-gray-200' : 'bg-white' }}">
                    {{ $i }}
                </a>
            @endfor
        
            @if ($items->hasMorePages())
                <a href="{{ $items->nextPageUrl() }}" class="border border-black px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</a>
            @else
                <span class="border border-black px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Selanjutnya</span>
            @endif
        </div>

    </div>
</div>


@endsection