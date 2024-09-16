<!DOCTYPE html>
<html>
<head>
    <title>Sampel {{ $sampel->kode_sampel }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Detail Sampel</h1>
    <table>
        <tr>
            <th>Kode Sampel</th>
            <td>{{ $sampel->kode_sampel }}</td>
        </tr>
        <tr>
            <th>Nama Sampel</th>
            <td>{{ $sampel->nama_sampel }}</td>
        </tr>
        <tr>
            <th>Tanggal Pengambilan</th>
            <td>{{ $sampel->tanggal_pengambilan }}</td>
        </tr>
        <tr>
            <th>Jenis Sampel</th>
            <td>{{ $sampel->jenis_sampel }}</td>
        </tr>
        <tr>
            <th>Status Sampel</th>
            <td>{{ $sampel->status_sampel }}</td>
        </tr>
        <tr>
            <th>Lokasi Penyimpanan</th>
            <td>{{ $sampel->lokasi_penyimpanan }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $sampel->keterangan }}</td>
        </tr>
    </table>
</body>
</html>
