<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Item {{ $year }}</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Pengunjung Item Tahun {{ $year }} (Kategori: {{ $kategori }})</h2>
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
