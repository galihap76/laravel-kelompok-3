@extends('layout')

@section('title', 'App - Kelompok 3')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            @if($welcomeMessage = Session::get('welcome'))
            <script>
                Swal.fire({
                title: "Berhasil",
                text: "{{ $welcomeMessage }}",
                icon: "success"
                });
            </script>

            @elseif($successMessage = Session::get('success'))
            <script>
                Swal.fire({
                title: "Berhasil",
                text: "{{ $successMessage }}",
                icon: "success"
                });
            </script>
            @endif

            <div class="card mb-3 mt-3">
                <div class="card-header">
                    <h5><i class="fas fa-table me-1"></i> Datatable Karyawan</h5>

                    <div class="mt-4">
                        <a href="{{ route('app.create')}}" class="btn btn-success mb-3">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleJabatan"
                            class="btn btn-primary mb-3 mx-3">
                            <i class="bi bi-search"></i> Cari Jabatan Karyawan
                        </button>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-danger mb-3">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>

                        <a href="{{url('cetak_pdf')}}" class="btn btn-secondary mb-3 mx-3" target="_blank"><i
                                class="bi bi-filetype-pdf"></i> CETAK PDF</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                @php
                                $no = 1;
                                @endphp

                                @foreach($data as $item)
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
                                    <td>
                                        <div class="row">

                                            <div class="col">
                                                <a href="{{ route('app.edit', $item->kode_karyawan) }}"
                                                    class="btn btn-warning text-white mb-2"><i
                                                        class="bi bi-pen-fill"></i>
                                                    Update</a>
                                            </div>

                                            <div class="col">
                                                <form action="{{ route('app.destroy', $item->kode_karyawan) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mb-2"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus data karyawan ini?')"><i
                                                            class="bi bi-trash-fill"></i> Delete</button>
                                                </form>
                                            </div>

                                            <div class="col">
                                                <a href="{{ route('app.show', $item->kode_karyawan) }}"
                                                    class="btn btn-primary text-white mb-2"><i
                                                        class="bi bi-eye-fill"></i>
                                                    Lihat</a>
                                            </div>
                                        </div>
                                    </td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah kamu yakin?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Pilih "logout" untuk keluar dari aplikasi.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{url('logout')}}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cari Jabatan -->
<div class="modal fade" id="exampleJabatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cari Jabatan Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Kode Jabatan</th>
                                    <th>Nama Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                @foreach($jabatan as $item)
                                <tr>
                                    <td>{{ $item->kode_jabatan }}</td>
                                    <td>{{ $item->nama_jabatan }}</td>
                                    <td><a href="{{ route('nama_jabatan', str_replace(' ', '_', strtolower($item->nama_jabatan))) }}"
                                            class="btn btn-primary m-2"> <i class="bi bi-search"></i> Cari</a></td>
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