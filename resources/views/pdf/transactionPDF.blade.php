<!DOCTYPE html>
<html>
<head>
    <title>Transaction List</title>
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
    <h1>Transaction List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Type</th>
                <th>Stock</th>
                <th>Transaction Date</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->product->namabarang }}</td>
                    <td>{{ $transaction->tipe == 'masuk' ? 'Masuk' : 'Keluar' }}</td>
                    <td>{{ $transaction->stok }}</td>
                    <td>{{ $transaction->tanggalTransaksi }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
