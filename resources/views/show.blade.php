@extends('layout')

@section('title', 'Lihat Data Karyawan - Kelompok 3')

@section('content')

<div class="container">
    <form method="post">
        @csrf

        <div class="row mt-4">
            <div class="col">
                <label for="nama_karyawan" class="fst-normal mb-3"> Nama Karyawan :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control nama_karyawan" id="nama_karyawan" name="nama_karyawan"
                        autocomplete="off" value="{{ $data->nama_karyawan }}" disabled>
                </div>

                <label for="alamat" class="fst-normal mb-3"> Alamat :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                    <input type="text" class="form-control w-50 alamat" id="alamat" name="alamat" autocomplete="off"
                        value="{{ $data->alamat }}" disabled>
                </div>

                <label for="kota" class="fst-normal mb-3"> Kota :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
                    <input type="text" class="form-control w-50 kota" id="kota" name="kota" autocomplete="off"
                        value="{{ $data->kota }}" disabled>
                </div>

                <label for="provinsi" class="fst-normal mb-3"> Provinsi :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-buildings-fill"></i></span>
                    <input type="text" class="form-control w-50 provinsi" id="provinsi" name="provinsi"
                        autocomplete="off" value="{{ $data->provinsi }}" disabled>
                </div>

                <label for="kode_pos" class="fst-normal mb-3"> Kode Pos :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-postcard-fill"></i></span>
                    <input type="number" class="form-control w-50 kode_pos" id="kode_pos" name="kode_pos"
                        autocomplete="off" value="{{ $data->kode_pos }}" disabled>
                </div>

                <label for="nomor_telepon" class="fst-normal mb-3"> No Telepon :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="number" class="form-control w-50 no_telepon" id="no_telepon" name="nomor_telepon"
                        autocomplete="off" value="{{ $data->nomor_telepon }}" disabled>
                </div>

                <label for="email" class="fst-normal mb-3"> Email :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control w-50 email" id="email" name="email" autocomplete="off"
                        value="{{ $data->email }}" disabled>
                </div>

                <label for="jabatan" class="fst-normal mb-3"> Jabatan :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                    <select class="form-select jabatan" aria-label="Default select example" name="jabatan" disabled>
                        <option selected value="{{ $data->jabatan }}">{{ $data->jabatan }}</option>
                    </select>
                </div>

                <label for="gaji_pokok" class="fst-normal mb-3"> Gaji Pokok :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
                    <select class="form-select" aria-label="Default select example" name="gaji_pokok" disabled>
                        <option selected value="{{ number_format($data->gaji_pokok) }}">{{
                            number_format($data->gaji_pokok) }}</option>
                    </select>
                </div>

                <label for="tanggal_masuk" class="fst-normal mb-3"> Tanggal Masuk :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
                    <input type="date" class="form-control w-50 tanggal_masuk" id="tanggal_masuk" name="tanggal_masuk"
                        autocomplete="off" value="{{ $data->tanggal_masuk }}" disabled>
                </div>
            </div>
        </div>

        <div class="modal-footer mt-3">
            <a href="{{url('/app')}}" class="btn btn-danger mx-3 mb-3">Kembali</a>
        </div>
    </form>
</div>
@endsection