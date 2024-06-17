<!DOCTYPE html>
<html>
<head>
    <title>Anomaly Report</title>
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
    <h1>Anomaly Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Occurred At</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anomalies as $anomaly)
                <tr>
                    <td>{{ $anomaly->id }}</td>
                    <td>{{ $anomaly->product->namabarang }}</td>
                    <td>{{ $anomaly->status }}</td>
                    <td>{{ $anomaly->quantity }}</td>
                    <td>{{ $anomaly->occurred_at }}</td>
                    <td>{{ $anomaly->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
