@extends('user.layouts.main')
@section('container')

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <div class="flex flex-col h-full justify-center items-center max-w-6xl lg:max-w-4xl mx-auto">
        <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
            REQUEST ITEM
        </h1>
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

        <form action="{{ route('request-items.store') }}" method="POST" class="w-full space-y-6 mt-3 px-6 lg:px-12 flex flex-col justify-center items-center">
            @csrf
          
            <!-- Dropdown -->
            <div class="w-full flex items-center border bg-white border-black rounded-full px-5 py-3 lg:py-4 focus-within:ring-2 focus-within:ring-blue-400">
                <select name="kategori" class="w-full text-sm lg:text-base text-gray-700 text-center focus:outline-none border-none bg-transparent">
                    <option value="">Pilih Kategori</option>
                    <option value="Elektronik Buku">Elektronik Buku</option>
                    <option value="Video Edukasi">Video Edukasi</option>
                </select>
                <span class="text-red-600 text-lg ml-2">*</span>
            </div>

            <!-- Input Text -->
            <div class="w-full flex items-center border bg-white border-black rounded-full px-5 py-3 lg:py-4 focus-within:ring-2 focus-within:ring-blue-400 mt-4">
                <input name="judul" type="text" placeholder="Ketikkan Judul..." class="w-full text-sm text-center lg:text-base text-gray-700 focus:outline-none bg-transparent placeholder:text-gray-700 border-none">
                <span class="text-red-600 text-lg ml-2">*</span>
            </div>
                      
            <div class="w-full bg-white border border-black p-4 lg:p-6 rounded-3xl flex flex-col justify-center items-center">
                <!-- Tahun Publikasi -->
                <label class="font-semibold text-sm lg:text-base">Tahun Publikasi</label>
                <div class="flex flex-wrap justify-center text-xs lg:text-sm gap-2 lg:gap-4 mt-4">
                    @for($year = date('Y'); $year >= date('Y') - 4; $year--)
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tahun" value="{{ $year }}"> <span>{{ $year }}</span>
                    </label>
                    @endfor
                </div>
            
                <!-- Kustom Tahun -->
                <div class="mt-5 w-full flex justify-center items-center gap-x-2">
                    <label class="block text-xs lg:text-sm font-medium">Kustom Tahun</label>
                    <input name="tahun_custom" type="text" placeholder="Ketikkan Tahun" class="text-xs lg:text-sm text-center placeholder:text-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
          
          <!-- Tombol Kirim -->
          <button type="submit" class="w-1/2 text-sm lg:text-base flex items-center justify-center gap-2 bg-blueJR text-white py-3 lg:py-4 border border-black rounded-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
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
        @forelse($requestItems as $item)
            <div class="flex lg:h-16 mb-2 gap-x-2">
                <div class="flex w-[80%] lg:w-[85%] text-sm items-center justify-between border border-black rounded-lg p-3">
                    <p>{{ $item->judul }}</p>
                </div>
                <div class="flex w-[15%] lg:w-[10%]
                    @if($item->status == 'Berhasil Dikirim') bg-green-500 
                    @elseif($item->status == 'Diproses') bg-yellow-500 
                    @else bg-red-500 @endif
                    items-center justify-center rounded-lg p-3 border border-black">
                    <p class="text-white text-center text-xs rounded">{{ $item->status }}</p>
                </div>
                <button
                    @if($item->status == 'Berhasil Dikirim') 
                        onclick="window.location.href='{{ route('search.index', ['search' => $item->judul]) }}'" 
                    @endif
                    class="flex w-[5%] 
                        @if($item->status == 'Berhasil Dikirim') bg-green-500 
                        @elseif($item->status == 'Diproses') bg-yellow-500 
                        @else bg-red-500 @endif
                        items-center justify-center rounded-lg p-3 border border-black 
                        @if($item->status != 'Berhasil Dikirim') cursor-not-allowed @endif"
                    @if($item->status != 'Berhasil Dikirim') disabled @endif
                >
                    @if($item->status == 'Berhasil Dikirim')
                        <i class="fa-solid fa-eye text-white"></i>
                    @else
                        <i class="fa-solid fa-eye-slash text-white"></i>
                    @endif
                </button>
            </div>
        @empty
            <p class="text-center text-gray-500 mt-4">Tidak ada request item yang anda kirimkan.</p>
        @endforelse
    </div>
</div>


@endsection