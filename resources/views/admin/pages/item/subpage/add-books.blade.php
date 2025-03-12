@extends('admin.layouts.main')
@section('container')

  
<div class="p-4 sm:ml-64 bg-gray-200 min-h-screen flex justify-center items-center">
    <div class="p-6 rounded-lg w-full max-w-6xl mt-24">
        <h1 class="text-center text-xl font-semibold mb-4">TAMBAH ELEKTRONIK BUKU</h1>
        
        <label class="block font-medium">Judul Buku</label>
        <input type="text" class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" placeholder="Ketikkan Judul...">
        
        <label class="block font-medium">Tahun Rilis</label>
        <input type="number" class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" placeholder="Ketikkan Tahun Rilis...">
        
        <label class="block font-medium">Deskripsi Buku</label>
        <textarea class="w-full border border-gray-400 rounded-xl p-2 mb-4 placeholder:text-gray-500" rows="4" placeholder="Ketikkan Deskripsi Buku..."></textarea>
        
        <label class="block font-medium">Kata Kunci</label>
        <div class="flex items-center gap-2 mb-2">
            <input type="text" id="keywordInput" class="w-full border border-gray-400 rounded-xl p-2 placeholder:text-gray-500" placeholder="Tambahkan Kata Kunci lalu tekan enter atau klik +" onkeydown="handleEnter(event)">
            <button onclick="addKeyword()" class="bg-blueJR text-white px-3 py-2 rounded-xl">+</button>
        </div>
        <div id="keywordsList" class="mb-4 flex flex-wrap gap-2"></div>
        <p id="errorMessage" class="text-red-500 text-sm mt-1"></p>
        
        <label class="block font-medium">Masukkan Cover Buku</label>
        <div class="flex items-center border border-gray-400 rounded p-2 bg-white gap-2">
            <i class="fa-solid fa-image fa-xl text-gray-600"></i>
            <label for="coverInput" id="coverLabel" class="text-gray-500 cursor-pointer">Pilih File IMG, JPG, JPEG, atau PNG...</label>
            <input type="file" id="coverInput" accept="image/png, image/jpeg, image/jpg" class="hidden" onchange="previewImage(this)">
        </div>
        <img id="coverPreview" class="hidden w-32 h-32 object-cover my-2 rounded-lg border border-gray-300" alt="Preview Gambar">
        <p id="coverOriginalName" class="hidden text-gray-700 text-sm"></p>
        
        <label class="block font-medium mt-4">Masukkan PDF</label>
        <div class="flex items-center border border-gray-400 rounded p-2 bg-white gap-2">
            <i class="fa-solid fa-file-pdf fa-xl text-gray-600"></i>
            <label for="pdfInput" id="pdfLabel" class="text-gray-500 cursor-pointer">Pilih File PDF...</label>
            <input type="file" id="pdfInput" accept="application/pdf" class="hidden" onchange="showPDFName(this)">
        </div>
        <p id="pdfPreview" class="hidden text-gray-700 text-sm"></p>
        
        <button class="w-full bg-blueJR text-white py-2 rounded-xl mt-4">Tambah Elektronik Buku</button>
    </div>
</div>

<script>
    function addKeyword() {
        let input = document.getElementById('keywordInput');
        let keyword = input.value.trim();
        let container = document.getElementById('keywordsList');
        let errorMessage = document.getElementById('errorMessage');
        let keywordCount = container.children.length;

        if (keywordCount >= 5) {
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
                if (container.children.length > 3) {
                    container.removeChild(keywordElement);
                    errorMessage.textContent = "";
                } else {
                    errorMessage.textContent = "Minimal harus ada 3 kata kunci.";
                }
            };

            keywordElement.appendChild(keywordText);
            keywordElement.appendChild(removeButton);
            container.appendChild(keywordElement);

            input.value = '';
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

    function showPDFName(input) {
        if (input.files.length > 0) {
            let file = input.files[0];
            let fileExtension = file.name.split('.').pop();
            let randomName = generateRandomName(fileExtension);

            document.getElementById("pdfLabel").textContent = randomName;
            document.getElementById("pdfPreview").textContent = `File (${fileExtension.toUpperCase()}): ${file.name}`;
            document.getElementById("pdfPreview").classList.remove("hidden");
        }
    }
</script>

@endsection