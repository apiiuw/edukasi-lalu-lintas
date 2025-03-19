@extends('user.layouts.main')
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
        setTimeout(() => {
            document.getElementById('success-alert')?.remove();
        }, 5000);
    </script>
@endif

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <div class="flex flex-col h-full justify-center items-center max-w-sm lg:max-w-lg mx-auto">
        <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
            FORUM DISKUSI
        </h1>

        <h1 class="text-base lg:text-xl text-black font-semibold mb-4 text-center">
            Pendapatmu adalah Evaluasi Kami, Diskusimu adalah Kontribusi Berharga untuk Mengembangkan Edulantas Menjadi Platform Edukasi Lalu Lintas yang Lebih Baik!
        </h1>
        
        <!-- Tombol Jasa Raharja -->
        <a href="https://jasaraharja.co.id/" target="_blank" type="submit" class=" lg:w-1/2 text-sm lg:text-base flex items-center justify-center gap-2 bg-blueJR text-white px-4 lg:px-0 py-3 lg:py-4 border border-black rounded-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
            Temukan Pertanyaanmu
        </a>
    </div>
</div>

{{-- Section 2 --}}
<div class="flex flex-col justify-center items-center px-6 lg:px-0">
    <div class="w-full max-w-5xl">
        <!-- Search Bar -->
        <form action="{{ route('forum-diskusi.search') }}" method="GET" class="flex items-center justify-center rounded-full p-2 shadow-md bg-white mb-3 border border-black">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                class="flex-grow p-2 outline-none border-none text-sm lg:text-base text-black placeholder:text-gray-700" 
                placeholder="Ketikkan Kata Kunci..."
            >
            <button class="p-2 bg-blueJR px-4 text-white rounded-full">
                <i class="fa-solid fa-xs lg:fa-lg fa-magnifying-glass"></i>
            </button>
        </form>        

        <!-- Kotak Pertanyaan -->
        <div class="space-y-2">
            @if ($forumDiskusi->isEmpty())
                <p class="text-center text-gray-500 text-sm lg:text-base mt-4">Tidak ada pertanyaan yang ditemukan.</p>
            @else
                @foreach ($forumDiskusi as $item)
                    <div class="faq-item">
                        <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                            <span>{{ $item->pertanyaan }}</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                            {{ $item->balasan_admin ?? 'Belum ada balasan dari admin.' }}
                        </div>
                    </div>
                @endforeach
            @endif        
        </div>
        
    </div>
</div>

<!-- Pagination -->
<div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
    {{-- Tombol Sebelumnya --}}
    @if ($forumDiskusi->onFirstPage())
        <button class="border px-4 py-2 rounded-lg text-gray-500 bg-white" disabled>Sebelumnya</button>
    @else
        <a href="{{ $forumDiskusi->previousPageUrl() }}" class="border px-4 py-2 rounded-lg text-gray-500 bg-white">Sebelumnya</a>
    @endif

    {{-- Nomor halaman --}}
    @for ($i = 1; $i <= $forumDiskusi->lastPage(); $i++)
        @if ($i == $forumDiskusi->currentPage())
            <button class="border px-4 py-2 rounded-lg bg-gray-200">{{ $i }}</button>
        @else
            <a href="{{ $forumDiskusi->url($i) }}" class="border px-4 py-2 rounded-lg bg-white">{{ $i }}</a>
        @endif
    @endfor

    {{-- Tombol Selanjutnya --}}
    @if ($forumDiskusi->hasMorePages())
        <a href="{{ $forumDiskusi->nextPageUrl() }}" class="border px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</a>
    @else
        <button class="border px-4 py-2 rounded-lg text-gray-500 bg-white" disabled>Selanjutnya</button>
    @endif
</div>

<div class="flex flex-col justify-center items-center my-20">
    <h1 class="text-sm lg:text-base">Belum menemukan jawaban?</h1>
    <a href="/form-forum-diskusi" class="text-sm lg:text-base px-10 py-2 text-blueJR underline rounded-xl">
        <span><i class="fa-solid fa-headset text-blueJR pr-1"></i></span>Tanya Admin
    </a>
</div>

<!-- Script untuk Toggle -->
<script>
    document.querySelectorAll(".faq-question").forEach((button) => {
        button.addEventListener("click", () => {
            const answer = button.nextElementSibling;
            const icon = button.querySelector("i");

            // Toggle visibility jawaban
            answer.classList.toggle("hidden");

            // Ubah ikon panah
            if (answer.classList.contains("hidden")) {
                icon.classList.replace("fa-chevron-up", "fa-chevron-down");
            } else {
                icon.classList.replace("fa-chevron-down", "fa-chevron-up");
            }
        });
    });
</script>


@endsection