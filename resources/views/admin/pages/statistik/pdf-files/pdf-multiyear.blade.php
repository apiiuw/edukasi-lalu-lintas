<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Perbandingan 5 Tahun</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Perbandingan Pengunjung 5 Tahun Terakhir</h2>
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
</body>
</html>
