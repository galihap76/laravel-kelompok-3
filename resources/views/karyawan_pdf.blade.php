<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Karyawan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>

    <h2 class="text-center mb-3">Laporan Karyawan</h2>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Kode Pos</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp

            @foreach($karyawan as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->kode_karyawan }}</td>
                <td>{{ $item->nama_karyawan }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->kota }}</td>
                <td>{{ $item->provinsi }}</td>
                <td>{{ $item->kode_pos }}</td>
                <td>{{ $item->nomor_telepon }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>