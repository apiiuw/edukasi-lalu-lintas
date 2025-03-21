@extends('user.layouts.main')
@section('container')

<div class="pt-28 px-4">
    <div class="w-full h-full bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
        <div class="flex flex-col items-center mb-20">
            <h1 class="text-lg md:text-xl w-52 lg:w-72 text-blueJR font-semibold text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
                {{ $item->judul }}
            </h1>

            <!-- Tampilkan jika item adalah Buku -->
            @if ($type === 'book')
            <div class="flex flex-col px-4 max-w-4xl">
                <div class="flex items-center justify-between bg-blueJR mt-6 w-full text-white border-t border-l border-r border-black rounded-t-lg px-4 py-2">
                    <span>Buku Elektronik</span>
                    <span>{{ $item->tahun_rilis }}</span>
                </div>
                <div class="bg-white shadow-md rounded-b-lg p-4 w-full border-b border-l border-r border-black">
                    <div class="p-4 text-sm text-gray-700">
                        <p>
                            {{ $item->deskripsi }}
                        </p>
                        <p class="mt-2"><strong>Kata Kunci:</strong> {{ $item->kata_kunci }}</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-4">
                <a href="{{ Storage::url($item->pdf) }}" target="_blank" class="bg-blueJR text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <span><i class="fa-solid fa-eye"></i></span> Lihat Detail
                </a>
                <a href="{{ Storage::url($item->pdf) }}" download="Edulantas_Buku {{ $item->judul }}.pdf" class="bg-blueJR text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <span><i class="fa-regular fa-circle-down"></i></span> Unduh Buku
                </a>                
            </div>

            <!-- Cover Image -->
            <div class="mt-6 w-full lg:w-4/12 px-2">
                <!-- Jika file adalah PDF, tampilkan dalam iframe -->
                <iframe src="{{ Storage::url($item->pdf) }}#zoom=page-width&page=1" class="w-full h-[400px] lg:h-[650px] rounded-md shadow-lg"></iframe>
            </div>

            @endif

            <!-- Tampilkan jika item adalah Video -->
            @if ($type === 'video')
            <div class="flex flex-col px-4 max-w-4xl">
                <div class="flex items-center justify-between bg-red-500 mt-6 w-full text-white border-t border-l border-r border-black rounded-t-lg px-4 py-2">
                    <span>Video Edukasi</span>
                    <span>{{ $item->tahun_rilis }}</span>
                </div>
                <div class="bg-white shadow-md rounded-b-lg p-4 w-full border-b border-l border-r border-black">
                    <div class="p-4 text-sm text-gray-700">
                        <p>{{ $item->deskripsi }}</p>
                        <p class="mt-2"><strong>Kata Kunci:</strong> {{ $item->kata_kunci }}</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-4">
                <a href="{{ $item->youtube_url }}" target="_blank" class="bg-red-500 text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <span><i class="fa-solid fa-eye"></i></span> Tonton di Youtube
                </a>
            </div>

            <!-- Embed Video -->
            <iframe 
                class="mt-6 w-full max-w-2xl h-56 lg:h-96 rounded-md shadow-md" 
                src="{{ $item->iframe_url }}?si=1NwGC4ROKW6uk8QZ&amp;controls=0" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
            </iframe>

            @endif
        </div>
    </div>
</div>

@endsection
