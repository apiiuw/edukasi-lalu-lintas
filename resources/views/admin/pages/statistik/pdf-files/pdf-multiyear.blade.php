<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perbandingan 5 Tahun</title>
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
    <header >
        <h4>PT. JASA RAHARJA</h4>
        <h4>KANTOR WILAYAH UTAMA DKI JAKARTA</h4>
        <h3>PLATFORM WEBSITE EDUKASI LALU LINTAS</h3>
        <p>Jl. Jatinegara Timur No.123, RT.1/RW.2, Bali Mester, Kecamatan Jatinegara,<br>Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310.</p>
    </header>

    <p style=" text-align: right;">{{ $tanggal }}</p>
    <p>
        Lampiran: 1 <br>
        Hal: Hal: Laporan Statistik Pengunjung Platform 5 Tahun Terakhir
    </p>

    <p>
        Kepada<br>
        Yth. Admin Edukasi Lalu Lintas
    </p>

    <p style="text-align: justify;">
        Bersama surat ini kami sampaikan <strong>Laporan Statistik Pengunjung Platform Edukasi Lalu Lintas PT Jasa Raharja Kantor Wilayah Utama DKI Jakarta</strong> untuk periode {{ $periode }}.
    </p>

    <p style="text-align: justify;">
        Laporan ini disusun sebagai bahan evaluasi terhadap performa platform dalam menjangkau pengguna, serta diharapkan dapat membantu Bapak/Ibu dalam menyusun strategi pengembangan konten, pemasaran, dan peningkatan pengalaman pengguna ke depannya.
    </p>

    <table>
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody>
            @foreach($years as $year)
                @foreach(range(1, 12) as $month)
                    <tr>
                        <td>{{ $year }}</td>
                        <td>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</td>
                        <td>{{ $multiYearMonthlyStats[$year][$month] ?? 0 }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <p style="text-align: justify;">
        Demikian laporan statistik pengunjung platform Edukasi Lalu Lintas PT Jasa Raharja Kantor Wilayah Utama DKI Jakarta untuk periode {{ $periode }}. Laporan ini diharapkan menjadi acuan dalam perbaikan strategi konten, pemasaran, dan pengembangan platform ke depannya.
    </p>

    <div class="footer">
        <p>
            Hormat kami, <br>
            IT Developer Platform Website Edukasi Lalu Lintas
        </p>
    </div>
</body>
</html>