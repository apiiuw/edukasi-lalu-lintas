<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Item {{ $year }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        header h2, header h3, header h4, header p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h4>PT. JASA RAHARJA</h4>
        <h4>KANTOR WILAYAH UTAMA DKI JAKARTA</h4>
        <h3>PLATFORM WEBSITE EDUKASI LALU LINTAS</h3>
        <p>Jl. Jatinegara Timur No.123, RT.1/RW.2, Bali Mester, Kecamatan Jatinegara,<br>Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310.</p>
    </header>

    <p style=" text-align: right;">{{ $tanggal }}</p>
    <p>
        Lampiran: 1 <br>
        Hal: Laporan Pengunjung Item Tahun {{ $year }} Kategori: {{ $kategoriDisplay }}
    </p>

    <p>
        Kepada<br>
        Yth. Admin Edukasi Lalu Lintas
    </p>

    <p style="text-align: justify;">
        Bersama surat ini kami sampaikan <strong>Laporan Pengunjung Item Tahun {{ $year }} Kategori: {{ $kategoriDisplay }} Platform Edukasi Lalu Lintas PT Jasa Raharja Kantor Wilayah Utama DKI Jakarta</strong>.
    </p>

    <p style="text-align: justify;">
        Laporan ini disusun sebagai bahan evaluasi terhadap performa platform dalam menjangkau pengguna, serta diharapkan dapat membantu Bapak/Ibu dalam menyusun strategi pengembangan konten, pemasaran, dan peningkatan pengalaman pengguna ke depannya.
    </p>

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

    <p style="text-align: justify;">
        Demikian laporan pengunjung item tahun {{ $year }} kategori: {{ $kategoriDisplay }} platform Edukasi Lalu Lintas PT Jasa Raharja Kantor Wilayah Utama DKI Jakarta. Laporan ini diharapkan menjadi acuan dalam perbaikan strategi konten, pemasaran, dan pengembangan platform ke depannya.
    </p>

    <div class="footer">
        <p>
            Hormat kami, <br>
            IT Developer Platform Website Edukasi Lalu Lintas
        </p>
    </div>
</body>
</html>