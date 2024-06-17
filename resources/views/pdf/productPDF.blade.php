<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
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
    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Starus</th>
                <th>Stok</th>
                <th>Terakhir Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->namabarang }}</td>
                    <td>{{ $product->kategori->name }}</td>
                    <td>{{ 'Rp ' . number_format($product->harga, 0, ',', '.') }}</td>
                    <td>{{ $product->ketersediaan == 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                    <td>{{ $product->stok}}</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
