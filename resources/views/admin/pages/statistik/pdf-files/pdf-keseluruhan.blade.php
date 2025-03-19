<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keseluruhan</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td, th { border: 1px solid #000; padding: 5px; }
        th { background-color: #eee; }
        h2, h3 { text-align: center; margin-top: 40px; }
    </style>
</head>
<body>
    <h2>Laporan Statistik Pengunjung Keseluruhan</h2>

    {{-- Multiyear Report --}}
    <h3>Perbandingan 5 Tahun Terakhir</h3>
    @foreach($multiYearMonthlyStats as $y => $dataBulanan)
        <h4>Tahun {{ $y }}</h4>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                @for($m = 1; $m <= 12; $m++)
                    <tr>
                        <td>{{ DateTime::createFromFormat('!m', $m)->format('F') }}</td>
                        <td>{{ $dataBulanan[$m] ?? 0 }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    @endforeach

    {{-- Monthly Report --}}
    <h3>Laporan Bulanan Tahun {{ $year }}</h3>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody>
            @for($m = 1; $m <= 12; $m++)
                <tr>
                    <td>{{ DateTime::createFromFormat('!m', $m)->format('F') }}</td>
                    <td>{{ $monthlyStats[$m] ?? 0 }}</td>
                </tr>
            @endfor
        </tbody>
    </table>

    {{-- Item Report --}}
    <h3>Laporan Pengunjung Berdasarkan Item Tahun {{ $year }} (Kategori: {{ $kategori }})</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Item</th>
                <th>Kategori</th>
                <th>Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody>
            @php
                $filteredItems = $pengunjungItems->filter(function ($item) {
                    return in_array($item->item_kategori, ['book', 'video']);
                });
            @endphp
            
            @foreach($filteredItems as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->item_judul }}</td>
                    <td>
                        @if ($item->item_kategori === 'book')
                            Elektronik Buku
                        @elseif ($item->item_kategori === 'video')
                            Video Edukasi
                        @else
                            {{ $item->item_kategori }}
                        @endif
                    </td>
                    <td>{{ $item->jumlah_pengunjung }}</td>
                </tr>
            @endforeach      
        </tbody>
    </table>
</body>
</html>
