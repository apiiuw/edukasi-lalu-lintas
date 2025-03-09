@extends('user.layouts.main')
@section('container')

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
        <div class="flex items-center justify-center rounded-full p-2 shadow-md bg-white mb-3 border border-black">
            <input type="text" class="flex-grow p-2 outline-none border-none text-sm lg:text-base text-black placeholder:text-gray-700" placeholder="Ketikkan Kata Kunci...">
            <button class="p-2 bg-blueJR px-4 text-white rounded-full">
                <i class="fa-solid fa-xs lg:fa-lg fa-magnifying-glass"></i>
            </button>
        </div>

        <!-- Kotak Pertanyaan -->
        <div class="space-y-2">
            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana jika menambahkan buku tentang penggunaan helm yang baik dan benar?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Menambahkan buku tentang helm dapat membantu meningkatkan kesadaran keselamatan berkendara.
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana cara membagikan buku yang kita baca pada platform edukasi lalu lintas?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Anda bisa mengunggah buku ke platform dengan mengisi formulir yang tersedia di halaman unggah.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana jika saya ingin request buku pada platform edukasi lalu lintas?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Anda dapat mengajukan permintaan buku melalui fitur request di dalam aplikasi.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana cara membayar pajak kendaraan?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Pajak kendaraan dapat dibayar melalui Samsat terdekat atau aplikasi e-Samsat online.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana jika menambahkan buku tentang penggunaan helm yang baik dan benar?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Menambahkan buku tentang helm dapat membantu meningkatkan kesadaran keselamatan berkendara.
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana cara membagikan buku yang kita baca pada platform edukasi lalu lintas?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Anda bisa mengunggah buku ke platform dengan mengisi formulir yang tersedia di halaman unggah.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana jika saya ingin request buku pada platform edukasi lalu lintas?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Anda dapat mengajukan permintaan buku melalui fitur request di dalam aplikasi.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana cara membayar pajak kendaraan?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Pajak kendaraan dapat dibayar melalui Samsat terdekat atau aplikasi e-Samsat online.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana jika menambahkan buku tentang penggunaan helm yang baik dan benar?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Menambahkan buku tentang helm dapat membantu meningkatkan kesadaran keselamatan berkendara.
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question w-full text-left bg-gray-200 px-4 py-2 rounded-md flex justify-between items-center">
                    <span>Bagaimana cara membagikan buku yang kita baca pada platform edukasi lalu lintas?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer hidden bg-gray-100 px-4 py-2 rounded-md mt-1">
                    Anda bisa mengunggah buku ke platform dengan mengisi formulir yang tersedia di halaman unggah.
                </div>
            </div>
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