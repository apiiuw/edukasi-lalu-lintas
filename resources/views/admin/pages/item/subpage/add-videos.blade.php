@extends('admin.layouts.main')
@section('container')

<!-- Overlay Loading -->
<div id="uploadOverlay" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-72">
        <p class="text-lg font-semibold mb-3">Mengunggah...</p>
        <div class="relative w-full h-4 bg-gray-300 rounded-full overflow-hidden">
            <div id="uploadProgressBar" class="absolute left-0 top-0 h-full bg-blue-500 transition-all duration-300" style="width: 0%;"></div>
        </div>
        <p id="uploadPercentage" class="text-sm mt-2">0%</p>
    </div>
</div>

<div class="p-4 sm:ml-64 bg-gray-200 min-h-screen flex justify-center items-center">
    <div class="p-6 rounded-lg w-full max-w-6xl mt-5 lg:mt-24">
        <h1 class="text-center text-xl font-semibold mb-4">TAMBAH VIDEO EDUKASI</h1>

        <form action="{{ route('admin.add.videos') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul Video -->
            <label class="block font-medium">Judul Video</label>
            <input type="text" name="judul" class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" placeholder="Ketikkan Judul..." required>

            <!-- Tahun Rilis -->
            <label class="block font-medium">Tahun Rilis</label>
            <input type="number" name="tahun_rilis" class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" placeholder="Ketikkan Tahun Rilis..." required>

            <!-- Deskripsi Video -->
            <label class="block font-medium">Deskripsi Video</label>
            <textarea name="deskripsi" class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" rows="4" placeholder="Ketikkan Deskripsi Video..." required></textarea>

            <!-- Kata Kunci -->
            <label class="block font-medium">Kata Kunci</label>
            <div class="flex items-center gap-2 mb-2">
                <input type="text" id="keywordInput" class="w-full border border-gray-400 rounded-xl p-2 placeholder:text-gray-500" placeholder="Tambahkan Kata Kunci lalu tekan enter atau klik +" onkeydown="handleEnter(event)">
                <button type="button" onclick="addKeyword()" class="bg-blueJR text-white px-3 py-2 rounded-xl">+</button>
            </div>
            <p id="errorMessage" class="text-red-500 text-sm"></p>
            <div id="keywordsList" class="mb-4 flex flex-wrap gap-2"></div>
            <input type="hidden" name="kata_kunci" id="kataKunciField">

            <!-- Thumbnail Video Youtube -->
            <label class="block font-medium">Thumbnail Video Youtube</label>
            <div class="flex items-center border border-gray-400 rounded p-2 bg-white gap-2">
                <i class="fa-solid fa-image fa-xl text-gray-600"></i>
                <label for="coverInput" id="coverLabel" class="text-gray-500 cursor-pointer">Pilih File IMG, JPG, JPEG, atau PNG...</label>
                <input type="file" id="coverInput" name="cover" accept="image/png, image/jpeg, image/jpg" class="hidden" onchange="previewImage(this)" required>
            </div>
            <img id="coverPreview" class="hidden w-32 h-32 object-cover my-2 rounded-lg border border-gray-300" alt="Preview Gambar">
            <p id="coverOriginalName" class="hidden text-gray-700 text-sm"></p>

            <!-- Link Video Youtube -->
            <label class="block font-medium mt-4">Link Video Youtube</label>
            <input type="text" id="youtubeLink" name="youtube_url" class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" placeholder="Masukkan URL Video..." oninput="updatePreview()" required>

            <div class="w-full flex justify-center">
                <iframe id="videoPreview" class="hidden w-full max-w-xl h-72 border border-gray-400 rounded-lg" frameborder="0" allowfullscreen></iframe>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-blueJR text-white py-2 rounded-xl mt-4">Tambah Video Edukasi</button>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const overlay = document.getElementById("uploadOverlay");
    const progressBar = document.getElementById("uploadProgressBar");
    const percentageText = document.getElementById("uploadPercentage");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah pengiriman langsung

        // Validasi sebelum mengunggah
        const judul = document.querySelector("input[name='judul']").value.trim();
        const tahunRilis = document.querySelector("input[name='tahun_rilis']").value.trim();
        const deskripsi = document.querySelector("textarea[name='deskripsi']").value.trim();
        const kataKunci = document.querySelector("input[name='kata_kunci']").value.trim();
        const youtubeUrl = document.querySelector("input[name='youtube_url']").value.trim();
        const cover = document.querySelector("input[name='cover']").files[0];

        let errors = [];

        if (!judul) errors.push("Judul wajib diisi.");
        if (!tahunRilis || isNaN(tahunRilis) || tahunRilis < 1900 || tahunRilis > new Date().getFullYear()) {
            errors.push("Tahun rilis harus valid (antara 1900 hingga tahun saat ini).");
        }
        if (!deskripsi) errors.push("Deskripsi wajib diisi.");
        
        const kataKunciList = kataKunci.split(',').map(k => k.trim()).filter(k => k !== '');
        if (kataKunciList.length < 3) {
            errors.push("Kata kunci minimal harus 3 dan dipisahkan dengan koma.");
        }

        if (!cover) {
            errors.push("Cover wajib diunggah.");
        } else if (!["image/jpeg", "image/png", "image/jpg"].includes(cover.type)) {
            errors.push("Cover harus berupa gambar (jpg, jpeg, png).");
        } else if (cover.size > 10 * 1024 * 1024) {
            errors.push("Ukuran cover maksimal 10MB.");
        }

        if (!youtubeUrl.match(/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]+$/)) {
            errors.push("Masukkan URL YouTube yang valid.");
        }

        // Jika ada error, tampilkan pesan dan batalkan unggahan
        if (errors.length > 0) {
            alert(errors.join("\n"));
            return;
        }

        // Jika lolos validasi, lanjutkan unggah
        overlay.classList.remove("hidden");

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();

        xhr.upload.addEventListener("progress", function (event) {
            if (event.lengthComputable) {
                let percent = Math.round((event.loaded / event.total) * 100);
                progressBar.style.width = percent + "%";
                percentageText.textContent = percent + "%";
            }
        });

        xhr.onload = function () {
            try {
                let response = JSON.parse(xhr.responseText);
                
                if (xhr.status === 200 && response.success) {
                    alert(response.message);
                    window.location.reload();
                } else {
                    alert("Error: " + response.message);
                }
            } catch (error) {
                alert("Terjadi kesalahan dalam memproses respons server.");
            }

            overlay.classList.add("hidden");
        };

        xhr.onerror = function () {
            alert("Gagal mengunggah. Periksa koneksi internet.");
            overlay.classList.add("hidden");
        };

        xhr.open("POST", form.action, true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.send(formData);
    });
});

    function addKeyword() {
        let input = document.getElementById('keywordInput');
        let keyword = input.value.trim();
        let container = document.getElementById('keywordsList');
        let errorMessage = document.getElementById('errorMessage');
        let kataKunciField = document.getElementById('kataKunciField');

        let keywords = Array.from(container.children).map(child => child.firstChild.textContent);

        if (keywords.length >= 5) {
            errorMessage.textContent = "Maksimal 5 kata kunci diperbolehkan.";
            return;
        }

        if (keyword) {
            let keywordElement = document.createElement('span');
            keywordElement.classList.add('bg-gray-300', 'text-black', 'px-2', 'py-1', 'rounded-xl', 'flex', 'items-center', 'gap-1');

            let keywordText = document.createElement('span');
            keywordText.textContent = keyword;

            let removeButton = document.createElement('button');
            removeButton.textContent = 'x';
            removeButton.classList.add('text-red-500', 'ml-2', 'hover:text-red-700', 'font-bold');
            removeButton.onclick = function () {
                container.removeChild(keywordElement);
                updateKataKunci();
            };

            keywordElement.appendChild(keywordText);
            keywordElement.appendChild(removeButton);
            container.appendChild(keywordElement);

            input.value = '';
            updateKataKunci();
        }
    }

    function updateKataKunci() {
        let container = document.getElementById('keywordsList');
        let kataKunciField = document.getElementById('kataKunciField');
        let errorMessage = document.getElementById('errorMessage');

        let keywords = Array.from(container.children).map(child => child.firstChild.textContent);
        kataKunciField.value = keywords.join(",");

        if (keywords.length < 3) {
            errorMessage.textContent = "Minimal 3 kata kunci diperlukan.";
        } else if (keywords.length > 5) {
            errorMessage.textContent = "Maksimal 5 kata kunci diperbolehkan.";
        } else {
            errorMessage.textContent = "";
        }
    }

    function handleEnter(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            addKeyword();
        }
    }

    function generateRandomName(extension) {
        return "file_" + Math.random().toString(36).substring(2, 10) + "." + extension;
    }

    function previewImage(input) {
        if (input.files.length > 0) {
            let file = input.files[0];
            let fileExtension = file.name.split('.').pop();
            let randomName = generateRandomName(fileExtension);

            document.getElementById("coverLabel").textContent = randomName;
            document.getElementById("coverOriginalName").textContent = `File (${fileExtension.toUpperCase()}): ${file.name}`;
            document.getElementById("coverOriginalName").classList.remove("hidden");

            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.getElementById("coverPreview");
                img.src = e.target.result;
                img.classList.remove("hidden");
            }
            reader.readAsDataURL(file);
        }
    }

    function updatePreview() {
        let url = document.getElementById('youtubeLink').value;
        let videoId = extractVideoId(url);
        let iframe = document.getElementById('videoPreview');
        
        if (videoId) {
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            iframe.classList.remove('hidden');
        } else {
            iframe.classList.add('hidden');
        }
    }
    
    function extractVideoId(url) {
        let regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]{11})/;
        let match = url.match(regex);
        return match ? match[1] : null;
    }
</script>

@endsection