<!DOCTYPE html>
<html>
<head>
    <title>Laporan OPName Gandaria Sepatu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan OPName Gandaria Sepatu </h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Sepatu</th>
                <th>Status Sepatu</th>
                <th>Jumlah  Sepatu Dikurangi</th>
                <th>Tanggal Kejadian</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anomalies as $anomaly)
                <tr>
                    <td>{{ $anomaly->id }}</td>
                    <td>{{ $anomaly->product->namabarang }}</td>
                    @if ($anomaly->status == "rusak")
                    <td>Rusak</td>
                    @elseif ($anomaly->status == "hilang")
                    <td>Hilang</td>
                    @else
                    <td>Lainnya</td>
                    @endif
                    <td>{{ $anomaly->store }}</td>
                    <td>{{ $anomaly->occurred_at }}</td>
                    <td>{{ $anomaly->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
