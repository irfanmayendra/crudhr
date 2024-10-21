<!DOCTYPE html>
<html>
<head>
    <title>Data Log</title>
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
    <h1>Data Log</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->tanggal }}</td>
                <td>{{ $log->jam }}</td>
                <td>{{ $log->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
