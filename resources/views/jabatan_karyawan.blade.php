@extends('layout')

@section('title', 'Jabatan Karyawan - Kelompok 3')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            <div class="card mb-3 mt-3">
                <div class="card-header">
                    <h5><i class="fas fa-table me-1"></i> Datatable Jabatan Karyawan</h5>

                    <div class="mt-4">
                        <a href="{{ url('/app')}}" class="btn btn-danger mb-3">
                            <i class="bi bi-box-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Kode Karyawan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan Karyawan</th>
                                    <th>Kode Jabatan</th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">

                                @foreach($jabatan_karyawan as $item)
                                <tr>
                                    <td>{{ $item->kode_karyawan }}</td>
                                    <td>{{ $item->nama_karyawan }}</td>
                                    <td>{{ $item->jabatan_karyawan }}</td>
                                    <td>{{ $item->kode_jabatan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection