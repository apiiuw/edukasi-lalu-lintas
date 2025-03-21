@extends('admin.layouts.main')
@section('container')
<div class="p-4 sm:ml-64 bg-gray-200">
    <div class="p-4 rounded-lg mt-24">
        <h1 class="text-center text-lg lg:text-xl font-semibold mb-4">STATISTIK PENGUNJUNG PLATFORM</h1>

        @if ($successMessage)
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
                            {{ $successMessage }}
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

        <div class="fixed bottom-4 right-4">
            <a href="{{ route('statistik.download', ['type' => 'all', 'year' => $selectedYear, 'kategori' => $selectedCategory]) }}" 
                target="_blank" class="cursor-pointer group relative flex gap-1.5 px-8 py-4 bg-blueJR hover:bg-blueDarkJR bg-opacity-60 text-[#f1f1f1] rounded-3xl hover:bg-opacity-100 transition font-semibold shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24px" width="24px">
                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#f1f1f1" d="M6 21H18M12 3V17M12 17L17 12M12 17L7 12"></path>
                </svg>
                Unduh Keseluruhan Laporan
            </a>
        </div>
    
        {{-- Grafik Multi-Line Bulanan 5 Tahun Terakhir --}}
        <div class="flex flex-col justify-center items-center bg-white p-4 rounded shadow mb-8">
            <h2 class="text-sm lg:text-lg font-semibold mb-2">Pengunjung 5 Tahun Terakhir</h2>
            <canvas id="multiLineChart"></canvas>
            <a class="py-2 px-3 bg-blueJR hover:bg-blueDarkJR mt-3 rounded-xl text-white" 
                href="{{ route('statistik.download', ['type' => 'multiyear']) }}" target="_blank">
                Unduh Laporan
            </a>
        </div>

        {{-- Grafik Bulanan Berdasarkan Tahun Terpilih --}}
        <div class="bg-white p-4 rounded shadow mb-8 flex flex-col justify-center items-center">
            <h2 class="text-sm lg:text-lg font-semibold mb-2">Pengunjung Bulanan Tahun {{ $selectedYear }}</h2>
            <form method="get" class="mb-4">
                <label class="text-xs lg:text-lg" for="year" class="mr-2">Pilih Tahun:</label>
                <select class="text-xs lg:text-lg border rounded p-[-3]" name="year" id="year" onchange="this.form.submit()">
                    @foreach ($years as $year)
                        <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </form>
            <canvas class="mb-5" id="monthlyChart"></canvas>
            <a class="py-2 px-3 bg-blueJR hover:bg-blueDarkJR mt-3 rounded-xl text-white" 
            href="{{ route('statistik.download', ['type' => 'monthly', 'year' => $selectedYear]) }}" target="_blank">
                Unduh Laporan
            </a>
        </div>

        {{-- Grafik Item Bulanan --}}
        <div class="bg-white p-4 rounded shadow mb-8 flex flex-col justify-center items-center">
            <h2 class="text-sm lg:text-lg font-semibold mb-2">Pengunjung Item Bulanan</h2>
        
            <form method="get" class="flex flex-wrap gap-2 mb-4 items-center justify-center">
                <div>
                    <label class="text-xs lg:text-sm mr-1">Tahun:</label>
                    <select name="year" class="border rounded p-1 text-xs" onchange="this.form.submit()">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-xs lg:text-sm mr-1">Kategori:</label>
                    <select name="kategori" class="border rounded p-1 text-xs" onchange="this.form.submit()">
                        <option value="Semua" {{ $selectedCategory == 'Semua' ? 'selected' : '' }}>Semua</option>
                        <option value="book" {{ $selectedCategory == 'Elektronik Buku' ? 'selected' : '' }}>Elektronik Buku</option>
                        <option value="video" {{ $selectedCategory == 'Video Edukasi' ? 'selected' : '' }}>Video Edukasi</option>
                    </select>
                </div>
            </form>
        
            <table class="table-auto border-collapse border w-full lg:w-3/4 text-xs lg:text-sm mb-4">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-2 py-1">Judul</th>
                        <th class="border px-2 py-1">Kategori</th>
                        <th class="border px-2 py-1">Jumlah Pengunjung</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengunjungItems as $item)
                        <tr>
                            <td class="border px-2 py-1">{{ $item->item_judul }}</td>
                            <td class="border px-2 py-1 text-center">{{ $item->kategori_nama }}</td>
                            <td class="border px-2 py-1 text-center">{{ $item->jumlah_pengunjung }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border px-2 py-2 text-center text-gray-500">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        
            <a class="py-2 px-3 bg-blueJR hover:bg-blueDarkJR rounded-xl text-white" 
            href="{{ route('statistik.download', ['type' => 'items', 'year' => $selectedYear, 'kategori' => $selectedCategory]) }}" target="_blank">
                Unduh Laporan
            </a> 
        </div>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik 5 Tahun Terakhir
    const fiveYearData = @json($fiveYearStats);
    const fiveYearLabels = fiveYearData.map(item => item.year);
    const fiveYearTotals = fiveYearData.map(item => item.total);

    new Chart(document.getElementById('fiveYearChart'), {
        type: 'bar',
        data: {
            labels: fiveYearLabels,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: fiveYearTotals,
                backgroundColor: '#4F46E5'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    // Grafik Bulanan Tahun Terpilih
    const monthlyStats = @json($monthlyStats);
    const monthlyLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    const selectedYearData = monthlyLabels.map((_, i) => monthlyStats[i+1] ?? 0);

    new Chart(document.getElementById('monthlyChart'), {
        type: 'bar',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: selectedYearData,
                backgroundColor: '#277FC6'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    // Grafik Multi-Line 5 Tahun Terakhir
    const multiYearMonthlyStats = @json($multiYearMonthlyStats);
    const lineColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];

    const lineDatasets = Object.keys(multiYearMonthlyStats).map((year, index) => ({
        label: `Tahun ${year}`,
        data: monthlyLabels.map((_, i) => multiYearMonthlyStats[year][i + 1] ?? 0),
        borderColor: lineColors[index],
        backgroundColor: lineColors[index],
        tension: 0.4,
        fill: false
    }));

    new Chart(document.getElementById('multiLineChart'), {
        type: 'line',
        data: {
            labels: monthlyLabels,
            datasets: lineDatasets
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
