@extends('admin.layouts.main')
@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-6 rounded-lg w-full max-w-6xl mt-16 lg:mt-24">
        <h1 class="text-center text-xl font-semibold mb-4">FORUM DISKUSI</h1>
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left border border-gray-300">
                <thead class="bg-blueJR text-white text-center">
                    <tr>
                        <th class="px-4 py-3">PERTANYAAN</th>
                        <th class="px-4 py-3">TANGGAL</th>
                        <th class="px-4 py-3">PENGIRIM</th>
                        <th class="px-4 py-3">STATUS</th>
                        <th class="px-4 py-3">PROSES</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700 text-xs">
                    <tr class="border-b">
                        <td class="px-4 py-3">Bagaimana cara request buku elektronik?</td>
                        <td class="px-4 py-3 text-center">2025-02-28</td>
                        <td class="px-4 py-3 text-center">Rafi Rizqallah Andila</td>
                        <td class="px-4 py-3 text-center text-yellow-500">Diproses</td>
                        <td class="px-4 py-3 text-center text-blueJR cursor-pointer">
                            Edit
                        </td>
                    </tr>
                    <!-- Tambahkan baris lainnya sesuai data -->
                    <tr class="border-b">
                        <td class="px-4 py-3">Pendidikan Disiplin Berlalu Lintas</td>
                        <td class="px-4 py-3 text-center">2025-02-26</td>
                        <td class="px-4 py-3 text-center">Uray Faisal</td>
                        <td class="px-4 py-3 text-center text-green-600">Berhasil Dikirim</td>
                        <td class="px-4 py-3 text-center text-blueJR cursor-pointer">
                            Edit
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-3">Rekayasa Lalu Lintas</td>
                        <td class="px-4 py-3 text-center">2025-02-20</td>
                        <td class="px-4 py-3 text-center">Gita Andini</td>
                        <td class="px-4 py-3 text-center text-red-500">Ditolak</td>
                        <td class="px-4 py-3 text-center text-blueJR cursor-pointer">
                            Edit
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
            <span class="border border-black px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Sebelumnya</span>
            <a href="" class="border px-4 py-2 rounded-lg border-black">1</a>
            <a href="" class="border border-black px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</a>
        </div>
    </div>
</div>

<!-- Modal Overlay -->
<div id="popupModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 w-96 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-xl">&times;</button>
        <h2 class="text-center font-semibold text-lg mb-4">STATUS</h2>
        <div class="text-sm space-y-3 mb-4">
            <div class="grid grid-cols-2 gap-2">
                <span>Pertanyaan</span>
                <span id="popupJudul" class="font-medium break-words text-right"></span>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <span>Tanggal</span>
                <span id="popupKategori" class="font-medium break-words text-right"></span>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <span>Pengirim</span>
                <span id="popupPengirim" class="font-medium break-words text-right"></span>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <span>Jawaban</span>
                <textarea class="w-full" type="text" name="" id=""></textarea>
            </div>
        </div>
        <div class="flex justify-center gap-2 mt-7">
            <a href="#" class="bg-green-600 flex justify-center items-center text-center border border-black text-white text-xs px-4 py-1 rounded">Kirim Jawaban</a>
            <a href="#" class="bg-red-600 flex justify-center items-center text-center border border-black text-white text-xs px-4 py-1 rounded">Tolak Jawaban</a>
        </div>
    </div>
</div>


<script>
    function openModal(judul, kategori, pengirim) {
        document.getElementById('popupJudul').innerText = judul;
        document.getElementById('popupKategori').innerText = kategori;
        document.getElementById('popupPengirim').innerText = pengirim;
        document.getElementById('popupModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('popupModal').classList.add('hidden');
    }

    // Event listener untuk semua tombol edit
    document.querySelectorAll('td.text-blueJR.cursor-pointer').forEach(item => {
        item.addEventListener('click', function() {
            const row = item.closest('tr');
            const judul = row.children[0].innerText;
            const kategori = row.children[1].innerText;
            const pengirim = row.children[2].innerText;
            openModal(judul, kategori, pengirim);
        });
    });
</script>

@endsection