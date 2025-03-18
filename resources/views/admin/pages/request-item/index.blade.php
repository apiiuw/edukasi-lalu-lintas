@extends('admin.layouts.main')
@section('container')

  
<div class="p-4 sm:ml-64">
    <div class="p-6 rounded-lg w-full max-w-6xl mt-16 lg:mt-24">
        <h1 class="text-center text-xl font-semibold mb-4">REQUEST ITEM</h1>
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left border border-gray-300">
                <thead class="bg-blueJR text-white text-center">
                    <tr>
                        <th class="px-4 py-3">JUDUL</th>
                        <th class="px-4 py-3">KATEGORI</th>
                        <th class="px-4 py-3">PENGIRIM</th>
                        <th class="px-4 py-3">STATUS</th>
                        <th class="px-4 py-3">PROSES</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700 text-xs">
                    @forelse($requestItems as $item)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $item->judul }}</td>
                        <td class="px-4 py-3 text-center">{{ $item->kategori }}</td>
                        <td class="px-4 py-3 text-center">{{ $item->pengirim }}</td>
                        <td class="px-4 py-3 text-center 
                            @if($item->status == 'Diproses') text-yellow-500 
                            @elseif($item->status == 'Berhasil Dikirim') text-green-600 
                            @elseif($item->status == 'Ditolak') text-red-500 
                            @endif">
                            {{ $item->status }}
                        </td>
                        <td class="px-4 py-3 text-center text-blueJR cursor-pointer">
                            <button 
                                onclick="openModal(
                                    '{{ $item->id }}', 
                                    '{{ $item->judul }}', 
                                    '{{ $item->kategori }}', 
                                    '{{ $item->pengirim }}', 
                                    '{{ $item->status }}'
                                )"
                                class="text-blueJR hover:underline"
                            >
                                Edit
                            </button>
                        </td>                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">Belum ada data request item.</td>
                    </tr>
                    @endforelse
                </tbody>                
            </table>
        </div>
        <div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
            {{-- Tombol sebelumnya --}}
            @if ($requestItems->onFirstPage())
                <span class="border border-black px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Sebelumnya</span>
            @else
                <a href="{{ $requestItems->previousPageUrl() }}" class="border border-black px-4 py-2 rounded-lg bg-blueJR text-white">Sebelumnya</a>
            @endif
        
            {{-- Nomor halaman --}}
            @for ($i = 1; $i <= $requestItems->lastPage(); $i++)
                @if ($i == $requestItems->currentPage())
                    <span class="border px-4 py-2 rounded-lg border-black bg-blueJR text-white">{{ $i }}</span>
                @else
                    <a href="{{ $requestItems->url($i) }}" class="border px-4 py-2 rounded-lg border-black">{{ $i }}</a>
                @endif
            @endfor
        
            {{-- Tombol selanjutnya --}}
            @if ($requestItems->hasMorePages())
                <a href="{{ $requestItems->nextPageUrl() }}" class="border border-black px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</a>
            @else
                <span class="border border-black px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Selanjutnya</span>
            @endif
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
                <span>Judul</span>
                <span id="popupJudul" class="font-medium break-words text-right"></span>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <span>Kategori</span>
                <span id="popupKategori" class="font-medium break-words text-right"></span>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <span>Pengirim</span>
                <span id="popupPengirim" class="font-medium break-words text-right"></span>
            </div>
        </div>
        <div class="flex justify-center gap-2 mt-7" id="popupActions"></div>
    </div>
</div>

<script>
    function openModal(id, judul, kategori, pengirim, status) {
        document.getElementById('popupJudul').textContent = judul;
        document.getElementById('popupKategori').textContent = kategori;
        document.getElementById('popupPengirim').textContent = pengirim;

        let actions = document.getElementById('popupActions');
        actions.innerHTML = ""; // Bersihkan tombol sebelumnya

        if (status === "Diproses") {
            actions.innerHTML = `
                <button onclick="updateStatus(${id}, 'Berhasil Dikirim')" class="bg-green-500 text-white px-4 py-1 rounded">Kirim</button>
                <button onclick="updateStatus(${id}, 'Ditolak')" class="bg-red-500 text-white px-4 py-1 rounded">Tolak</button>
            `;
        } else if (status === "Berhasil Dikirim") {
            actions.innerHTML = `
                <button onclick="updateStatus(${id}, 'Diproses')" class="bg-yellow-400 text-white px-4 py-1 rounded">Proses</button>
                <button onclick="updateStatus(${id}, 'Ditolak')" class="bg-red-500 text-white px-4 py-1 rounded">Tolak</button>
            `;
        } else if (status === "Ditolak") {
            actions.innerHTML = `
                <button onclick="updateStatus(${id}, 'Diproses')" class="bg-yellow-400 text-white px-4 py-1 rounded">Proses</button>
            `;
        }

        document.getElementById('popupModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('popupModal').classList.add('hidden');
    }

    function updateStatus(id, newStatus) {
        fetch(`/admin-request-item/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                closeModal();
                showSuccessMessage('Status berhasil diubah!');

                // Ambil kategori dari modal (yang sudah dimasukkan saat openModal)
                const kategori = document.getElementById('popupKategori').textContent.trim().toLowerCase();

                if (newStatus === 'Berhasil Dikirim') {
                    // Tunggu 2 detik setelah pesan sukses, lalu redirect
                    setTimeout(() => {
                        if (kategori === 'elektronik buku') {
                            window.location.href = '/admin-add-books';
                        } else if (kategori === 'video edukasi') {
                            window.location.href = '/admin-add-videos';
                        } else {
                            // Kalau kategori tidak sesuai, hanya reload
                            window.location.reload();
                        }
                    }, 2000);
                } else {
                    // Kalau tombol selain kirim (proses/tolak), cukup reload
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            }
        })
        .catch(err => console.error(err));
    }

    function showSuccessMessage(message) {
        const alertHtml = `
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
                            ${message}
                        </p>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', alertHtml);
        setTimeout(() => {
            document.getElementById('success-alert')?.remove();
        }, 2000);
    }

</script>



@endsection