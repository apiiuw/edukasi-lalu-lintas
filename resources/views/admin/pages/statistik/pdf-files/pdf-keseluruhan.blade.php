

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Statistik Pengunjung</title>
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
        .section-title {
            margin-top: 40px;
            font-weight: bold;
            font-size: 16px;
        }
        .footer {
            margin-top: 20px;
        }
        .page-break {
            page-break-after: always;
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

    <p style="text-align: right;">{{ $tanggal }}</p>
    <p>
        Lampiran: 3 <br>
        Hal: Laporan Statistik Pengunjung Keseluruhan
    </p>

    <p>
        Kepada<br>
        Yth. Admin Edukasi Lalu Lintas
    </p>

    <p style="text-align: justify;">
        Bersama surat ini kami sampaikan <strong>Laporan Statistik Pengunjung Platform Edukasi Lalu Lintas PT Jasa Raharja Kantor Wilayah Utama DKI Jakarta</strong>.
    </p>

    <p class="section-title">I. Statistik Pengunjung 5 Tahun Terakhir</p>
    <table>
        <thead>
            <tr>
                <th>Bulan / Tahun</th>
                @foreach ($years as $y)
                    <th>{{ $y }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @for ($bulan = 1; $bulan <= 12; $bulan++)
                <tr>
                    <td style="text-align: left;">
                        {{ \Carbon\Carbon::create()->month($bulan)->locale('id')->isoFormat('MMMM') }}
                    </td>
                    @foreach ($years as $y)
                        <td>{{ $multiYearMonthlyStats[$y][$bulan] ?? 0 }}</td>
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>

    <p class="section-title">II. Statistik Pengunjung Tahun {{ $year }}</p>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody>
            @for ($bulan = 1; $bulan <= 12; $bulan++)
                <tr>
                    <td style="text-align: left;">
                        {{ \Carbon\Carbon::create()->month($bulan)->locale('id')->isoFormat('MMMM') }}
                    </td>
                    <td>{{ $monthlyStats[$bulan] ?? 0 }}</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <p class="section-title">III. Statistik Pengunjung Item Tahun {{ $year }} Kategori: {{ $kategoriDisplay }}</p>
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
            @foreach($pengunjungItems as $i => $item)
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
        Demikian laporan statistik pengunjung platform Edukasi Lalu Lintas PT Jasa Raharja Kantor Wilayah Utama DKI Jakarta. Semoga laporan ini bermanfaat untuk penyusunan strategi pengembangan platform ke depan.
    </p>

    <div class="footer">
        <p>
            Hormat kami, <br>
            IT Developer Platform Website Edukasi Lalu Lintas
        </p>
    </div>
</body>
</html>
