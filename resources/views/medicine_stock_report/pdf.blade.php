<!DOCTYPE html>
<html>
<head>
    <title>Medicine Stock Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Medicine Stock Report</h1>
    <table>
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Packing</th>
                <th>Generic Name</th>
                <th>Expiry Date</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->packing }}</td>
                    <td>{{ $medicine->generic_name }}</td>
                    <td>{{ $medicine->expiry_date }}</td>
                    <td>{{ $medicine->supplier->name ?? 'N/A' }}</td>
                    <td>{{ $medicine->quantity }}</td>
                    <td>{{ $medicine->rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>