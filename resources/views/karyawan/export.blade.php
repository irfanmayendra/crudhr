<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Karyawan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->name }}</td>
                <td>{{ $k->tgl_lahir }}</td>
                <td>{{ $k->gaji }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
