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
                    @foreach($data as $item)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $item->pertanyaan }}</td>
                        <td class="px-4 py-3 text-center">{{ $item->tanggal }}</td>
                        <td class="px-4 py-3 text-center">{{ $item->pengirim }}</td>
                        <td class="px-4 py-3 text-center 
                            @if($item->status == 'Diproses') text-yellow-500 
                            @elseif($item->status == 'Berhasil Dikirim') text-green-600 
                            @else text-red-500 
                            @endif
                        ">
                            {{ $item->status }}
                        </td>
                        <td class="px-4 py-3 text-center text-blueJR cursor-pointer">
                            <button 
                                onclick="openModal(this)"
                                data-id="{{ $item->id }}"
                                data-pertanyaan="{{ $item->pertanyaan }}"
                                data-tanggal="{{ $item->tanggal }}"
                                data-pengirim="{{ $item->pengirim }}"
                                data-status="{{ $item->status }}"
                                data-balasan="{{ $item->balasan_admin ?? '' }}"
                            >
                                Edit
                            </button>
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
        <div class="mt-6 text-xs lg:text-sm flex justify-center items-center space-x-2">
            {{-- Tombol Sebelumnya --}}
            @if ($data->onFirstPage())
                <span class="border border-black px-4 py-2 rounded-lg text-gray-300 bg-white cursor-not-allowed">Sebelumnya</span>
            @else
                <a href="{{ $data->previousPageUrl() }}" class="border px-4 py-2 rounded-lg border-black bg-blueJR text-white">Sebelumnya</a>
            @endif
        
            {{-- Nomor Halaman --}}
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                @if ($i == $data->currentPage())
                    <span class="border border-black px-4 py-2 rounded-lg bg-blueJR text-white">{{ $i }}</span>
                @else
                    <a href="{{ $data->url($i) }}" class="border px-4 py-2 rounded-lg border-black">{{ $i }}</a>
                @endif
            @endfor
        
            {{-- Tombol Selanjutnya --}}
            @if ($data->hasMorePages())
                <a href="{{ $data->nextPageUrl() }}" class="border border-black px-4 py-2 rounded-lg bg-blueJR text-white">Selanjutnya</a>
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
                <textarea id="popupJawaban" class="w-full border rounded p-1" rows="3"></textarea>
            </div>
        </div>
        <div id="popupButtons" class="flex justify-center gap-2 mt-7">
            <!-- Tombol-tombol akan di-generate lewat JS -->
        </div>        
    </div>
</div>

<script>
    function openModal(button) {
        const id = button.getAttribute('data-id');
        const pertanyaan = button.getAttribute('data-pertanyaan');
        const tanggal = button.getAttribute('data-tanggal');
        const pengirim = button.getAttribute('data-pengirim');
        const status = button.getAttribute('data-status');
        const balasan = button.getAttribute('data-balasan');

        document.getElementById('popupJudul').innerText = pertanyaan;
        document.getElementById('popupKategori').innerText = tanggal;
        document.getElementById('popupPengirim').innerText = pengirim;
        document.getElementById('popupJawaban').value = balasan ?? '';

        const buttonContainer = document.getElementById('popupButtons');
        buttonContainer.innerHTML = '';

        if (status.toLowerCase() === 'diproses') {
            buttonContainer.innerHTML = `
                <button onclick="kirimJawaban(${id})" class="bg-green-600 border border-black text-white text-xs px-4 py-1 rounded">Kirim Jawaban</button>
                <button onclick="tolakPertanyaan(${id})" class="bg-red-600 border border-black text-white text-xs px-4 py-1 rounded">Tolak Pertanyaan</button>
            `;
        } else if (status.toLowerCase() === 'berhasil dikirim') {
            buttonContainer.innerHTML = `
                <button onclick="ubahJawaban(${id})" class="bg-yellow-500 border border-black text-white text-xs px-4 py-1 rounded">Ubah Jawaban</button>
                <button onclick="tolakPertanyaan(${id})" class="bg-red-600 border border-black text-white text-xs px-4 py-1 rounded">Tolak Pertanyaan</button>
            `;
        } else if (status.toLowerCase() === 'ditolak') {
            buttonContainer.innerHTML = `
                <button onclick="kirimJawaban(${id})" class="bg-green-600 border border-black text-white text-xs px-4 py-1 rounded">Kirim Jawaban</button>
                <button onclick="prosesPertanyaan(${id})" class="bg-yellow-500 border border-black text-white text-xs px-4 py-1 rounded">Diproses</button>
            `;
        }

        document.getElementById('popupModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('popupModal').classList.add('hidden');
    }

    function kirimJawaban(id) {
        const jawaban = document.getElementById('popupJawaban').value.trim();
        if (jawaban === '') {
            alert('Harap isi jawaban terlebih dahulu!');
            return;
        }
        updateForum(id, { action: 'kirim_jawaban', balasan_admin: jawaban });
    }

    function ubahJawaban(id) {
        const jawaban = document.getElementById('popupJawaban').value.trim();
        if (jawaban === '') {
            alert('Harap isi jawaban terlebih dahulu!');
            return;
        }
        updateForum(id, { action: 'ubah_jawaban', balasan_admin: jawaban });
    }

    function tolakPertanyaan(id) {
        if (confirm('Yakin ingin menolak pertanyaan ini?')) {
            updateForum(id, { action: 'tolak_pertanyaan' });
        }
    }

    function prosesPertanyaan(id) {
        updateForum(id, { action: 'diproses' });
    }

    function updateForum(id, data) {
        fetch(`/admin/forum-diskusi/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(res => {
            if (res.message) {
                alert(res.message);
                closeModal();
                location.reload();
            } else {
                alert('Terjadi kesalahan!');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error saat memproses data.');
        });
    }



</script>
    
    

@endsection