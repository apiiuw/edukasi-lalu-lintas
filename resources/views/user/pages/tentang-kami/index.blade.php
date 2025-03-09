@extends('user.layouts.main')
@section('container')

{{-- Section 1 --}}
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('/img/background/bg-jr-gray.png');">
    <div class="flex flex-col h-full justify-center items-center max-w-sm lg:max-w-lg mx-auto">
        <h1 class="text-base lg:text-xl text-blueJR font-semibold mb-4 text-center relative after:content-[''] after:block after:w-16 after:h-[2px] after:bg-blueJR after:mx-auto after:mt-1">
            TENTANG KAMI
        </h1>

        <h1 class="text-base lg:text-xl text-black font-semibold mb-4 text-center">
            Edukasi Lalu Lintas Berupaya Membangun Generasi Muda yang Peduli Keselamatan dan Tertib Berlalu Lintas Sejak Dini.
        </h1>
        
        <!-- Tombol Jasa Raharja -->
        <a href="https://jasaraharja.co.id/" target="_blank" type="submit" class=" lg:w-1/2 text-sm lg:text-base flex items-center justify-center gap-2 bg-blueJR text-white px-4 lg:px-0 py-3 lg:py-4 border border-black rounded-full lg:transition lg:duration-300 lg:ease-in-out lg:hover:scale-105">
            Kunjungi Laman Resmi Kami
        </a>
    </div>
</div>

<div class="w-full h-full flex flex-col gap-y-20">
    
    <div class="flex flex-col lg:flex-row lg:gap-x-16 px-10 lg:px-0 h-full justify-center items-center max-w-6xl lg:max-w-5xl mx-auto">
        <img class="w-5/6 lg:w-full" src="{{ asset('img/logo/logo-edulantas.png') }}" alt="Logo Edulantas">
        <p class="text-sm lg:text-base text-center lg:text-start mt-5 lg:mt-0">Platform edukasi digital yang bertujuan untuk meningkatkan pemahaman masyarakat tentang keselamatan dan aturan dalam berlalu lintas. Dikembangkan oleh Jasa Raharja Cabang Utama DKI Jakarta, platform ini menyediakan berbagai materi pembelajaran interaktif yang informatif dan mudah dipahami oleh semua kalangan, mulai dari anak-anak, remaja, hingga orang dewasa.</p>
    </div>

    <div class="flex flex-col px-10 lg:px-0 h-full justify-center items-center max-w-6xl lg:max-w-2xl mx-auto">
        <img class="w-5/6 lg:w-full rounded-2xl" src="{{ asset('img/user/tentang-kami/tentang-kami-1.png') }}" alt="Tentang Kami">
        <p class="text-sm lg:text-base text-justify w-full mt-8 lg:mt-5">
            Melalui Edukasi Lalu Lintas, masyarakat dapat mempelajari hal-hal penting seperti:
            <br>
            <span>
                <ul class="text-sm lg:text-base text-justify mt-3 lg:mt-5 list-disc pl-4">
                    <li>Aturan Dasar Lalu Lintas: Mengenal rambu-rambu lalu lintas, lampu lalu lintas, dan marka jalan.</li>
                    <li>Etika Berkendara yang Baik: Memahami pentingnya menghargai pengguna jalan lain, termasuk pejalan kaki dan pengendara sepeda.</li>
                    <li>Keselamatan di Jalan: Cara menyeberang yang benar, pentingnya mengenakan helm, dan tips menjaga keamanan diri saat berada di jalan raya.</li>
                </ul>       
            </span>
        </p> 
    </div>

    <div class="flex flex-col px-10 lg:px-0 h-full justify-center items-center max-w-6xl lg:max-w-2xl mx-auto">
        <img class="w-5/6 lg:w-full rounded-2xl" src="{{ asset('img/user/tentang-kami/smart.png') }}" alt="Tentang Kami">
        <p class="text-sm lg:text-base text-justify w-full mt-8 lg:mt-5">
            Dengan adanya Edukasi Lalu Lintas, Jasa Raharja berharap dapat membantu tidak hanya siswa SD dan SMP, tetapi juga masyarakat luas untuk lebih sadar akan pentingnya keselamatan di jalan dan kepatuhan terhadap aturan lalu lintas sejak dini. Platform ini dirancang dengan pendekatan SMART (Specific, Measurable, Achievable, Relevant, Time-bound).
        </p> 
    
        <!-- SMART Framework -->
        <div class="mt-10 w-full flex flex-col space-y-3">
            <div class="flex justify-center items-center h-auto">
                <!-- Kolom Kiri -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-l-lg border-2 border-blueJR p-5">
                    <p class="text-lg lg:text-xl font-semibold">
                        <span class="text-blueJR text-5xl lg:text-6xl font-bold">S</span>pecific
                    </p>
                </div>
            
                <!-- Kolom Kanan -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-r-lg border-2 border-blueJR p-5">
                    <p class="text-xs lg:text-sm">
                        Meningkatkan kesadaran masyarakat akan pentingnya keselamatan lalu lintas serta mengurangi angka kecelakaan.
                    </p>
                </div>
            </div>

            <div class="flex justify-center items-center h-auto">
                <!-- Kolom Kiri -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-l-lg border-2 border-blueJR p-5">
                    <p class="text-lg lg:text-xl font-semibold">
                        <span class="text-blueJR text-5xl lg:text-6xl font-bold">M</span>easurable
                    </p>
                </div>
            
                <!-- Kolom Kanan -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-r-lg border-2 border-blueJR p-5">
                    <p class="text-xs lg:text-sm">
                        Program ini diharapkan mampu mengurangi angka kecelakaan lalu lintas hingga 50%.
                    </p>
                </div>
            </div>

            <div class="flex justify-center items-center h-auto">
                <!-- Kolom Kiri -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-l-lg border-2 border-blueJR p-5">
                    <p class="text-lg lg:text-xl font-semibold">
                        <span class="text-blueJR text-5xl lg:text-6xl font-bold">A</span>chievable
                    </p>
                </div>
            
                <!-- Kolom Kanan -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-r-lg border-2 border-blueJR p-5">
                    <p class="text-xs lg:text-sm">
                        Program ini didukung dengan materi yang tersusun secara sistematis dan dapat diterapkan dengan mudah.
                    </p>
                </div>
            </div>

            <div class="flex justify-center items-center h-auto">
                <!-- Kolom Kiri -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-l-lg border-2 border-blueJR p-5">
                    <p class="text-lg lg:text-xl font-semibold">
                        <span class="text-blueJR text-5xl lg:text-6xl font-bold">R</span>elevant
                    </p>
                </div>
            
                <!-- Kolom Kanan -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-r-lg border-2 border-blueJR p-5">
                    <p class="text-xs lg:text-sm">
                        Meningkatkan pengetahuan dan kesadaran tentang keselamatan lalu lintas sebagai bagian dari strategi pencegahan kecelakaan.
                    </p>
                </div>
            </div>

            <div class="flex justify-center items-center h-auto">
                <!-- Kolom Kiri -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-l-lg border-2 border-blueJR p-5">
                    <p class="text-lg lg:text-xl font-semibold">
                        <span class="text-blueJR text-5xl lg:text-6xl font-bold">T</span>ime-bound
                    </p>
                </div>
            
                <!-- Kolom Kanan -->
                <div class="w-1/2 h-44 lg:h-32 text-center flex items-center justify-center rounded-r-lg border-2 border-blueJR p-5">
                    <p class="text-xs lg:text-sm">
                        Dalam waktu tiga tahun, program ini diharapkan dapat mencapai tujuan “zero accident”.
                    </p>
                </div>
            </div>
        </div>
    </div>    

</div>

@endsection