@extends('user.layouts.main')
@section('container')

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <div class="flex flex-col h-full justify-center items-center max-w-6xl lg:max-w-4xl mx-auto">
        <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
            FORM FORUM DISKUSI
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

        <form action="{{ route('form-forum-diskusi.store') }}" method="POST" class="w-full space-y-6 mt-3 px-6 lg:px-12 flex flex-col justify-center items-center">
            @csrf
            <!-- Input Text -->
            <div class="relative w-full">
                <textarea name="pertanyaan" placeholder="Ketikkan pertanyaan..." required
                    class="w-full lg:h-44 text-sm lg:text-base px-5 py-4 border border-black rounded-2xl text-start placeholder:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"></textarea>
                <span class="absolute right-4 top-3 text-red-600 text-lg">*</span>
            </div>            
        
            <!-- Tombol Kirim --> 
            <button type="submit" class="w-1/2 text-sm lg:text-base flex items-center justify-center gap-2 bg-blueJR text-white py-3 lg:py-4 border border-black rounded-full">
                Kirim Pertanyaan 
            </button>
        </form>        
    </div>
</div>

{{-- Section 2 --}}
<div class="w-full mb-20 flex flex-col justify-center items-center">
    <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
        STATUS PERTANYAAN
    </h1>

    {{-- Table --}}
    <div class="w-full px-6 lg:px-12 flex flex-col max-w-6xl lg:max-w-4xl">
        @foreach ($data as $item)
            @php
            $statusColor = 'bg-yellow-500'; // default Diproses
            $icon = 'fa-eye-slash';
            $isClickable = false;
            if ($item->status == 'Berhasil Dikirim') {
                $statusColor = 'bg-green-500';
                $icon = 'fa-eye';
                $isClickable = true;
            } elseif ($item->status == 'Ditolak') {
                $statusColor = 'bg-red-500';
                $icon = 'fa-eye-slash';
            }
        @endphp
        
        <div class="flex lg:h-16 mb-2 gap-x-2">
            <div class="flex w-[80%] lg:w-[85%] items-center text-sm justify-between border border-black rounded-lg p-3">
                <p>{{ $item->pertanyaan }}</p>
            </div>
            <div class="flex w-[15%] lg:w-[10%] {{ $statusColor }} items-center justify-center rounded-lg p-3 border border-black">
                <p class="text-white text-center text-xs rounded">{{ $item->status }}</p>
            </div>
            @if($isClickable)
                <a href="{{ url('/forum-diskusi?search=' . urlencode($item->pertanyaan)) }}" class="flex w-[5%] {{ $statusColor }} items-center justify-center rounded-lg p-3 border border-black">
                    <i class="fa-solid {{ $icon }} text-white"></i>
                </a>
            @else
                <button disabled class="flex w-[5%] {{ $statusColor }} items-center justify-center rounded-lg p-3 border border-black cursor-not-allowed">
                    <i class="fa-solid {{ $icon }} text-white"></i>
                </button>
            @endif
        </div>    
        @endforeach
    </div>

    </div>
</div>


@endsection