<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Bulanan {{ $year }}</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Pengunjung Bulanan Tahun {{ $year }}</h2>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody>
            @foreach(range(1, 12) as $month)
                <tr>
                    <td>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</td>
                    <td>{{ $monthlyStats[$month] ?? 0 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
