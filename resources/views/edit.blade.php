@extends('layout')

@section('title', 'Update Data Karyawan - Kelompok 3')

@section('content')

<div class="container">

    <form method="post" id="update" action="{{ route('app.update', $data->kode_karyawan) }}">
        @csrf

        @method('PUT')
        <div class="row mt-4">
            <div class="col">
                <label for="nama_karyawan" class="fst-normal mb-3">Isikan Nama Karyawan :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror nama_karyawan"
                        id="nama_karyawan" name="nama_karyawan" autocomplete="off" value="{{ $data->nama_karyawan }}">
                </div>

                @if ($errors->has('nama_karyawan'))
                <p class="textNamaKaryawan" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('nama_karyawan'))}}
                </p>
                @endif

                <label for="alamat" class="fst-normal mb-3">Isikan Alamat :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                    <input type="text" class="form-control w-50 @error('alamat') is-invalid @enderror alamat"
                        id="alamat" name="alamat" autocomplete="off" value="{{ $data->alamat }}">
                </div>

                @if ($errors->has('alamat'))
                <p class="textAlamat" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('alamat'))}}
                </p>
                @endif

                <label for="kota" class="fst-normal mb-3">Isikan Kota :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
                    <input type="text" class="form-control w-50 @error('kota') is-invalid @enderror kota" id="kota"
                        name="kota" autocomplete="off" value="{{ $data->kota }}">
                </div>

                @if ($errors->has('kota'))
                <p class="textKota" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('kota'))}}
                </p>
                @endif

                <label for="provinsi" class="fst-normal mb-3">Isikan Provinsi :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-buildings-fill"></i></span>
                    <input type="text" class="form-control w-50 @error('provinsi') is-invalid @enderror provinsi"
                        id="provinsi" name="provinsi" autocomplete="off" value="{{ $data->provinsi }}">
                </div>

                @if ($errors->has('provinsi'))
                <p class="textProvinsi" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('provinsi'))}}
                </p>
                @endif

                <label for="kode_pos" class="fst-normal mb-3">Isikan Kode Pos :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-postcard-fill"></i></span>
                    <input type="number" class="form-control w-50 @error('kode_pos') is-invalid @enderror kode_pos"
                        id="kode_pos" name="kode_pos" autocomplete="off" value="{{ $data->kode_pos }}">
                </div>

                @if ($errors->has('kode_pos'))
                <p class="textKodePos" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('kode_pos'))}}
                </p>
                @endif

                <label for="nomor_telepon" class="fst-normal mb-3">Isikan No Telepon :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="number"
                        class="form-control w-50 @error('nomor_telepon') is-invalid @enderror no_telepon"
                        id="no_telepon" name="nomor_telepon" autocomplete="off" value="{{ $data->nomor_telepon }}">
                </div>

                @if ($errors->has('nomor_telepon'))
                <p class="textNoTelepon" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('nomor_telepon'))}}
                </p>
                @endif

                <label for="email" class="fst-normal mb-3">Isikan Email :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control w-50 @error('email') is-invalid @enderror email" id="email"
                        name="email" autocomplete="off" value="{{ $data->email }}">
                </div>

                @if ($errors->has('email'))
                <p class="textEmail" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('email'))}}
                </p>
                @endif

                <label for="jabatan" class="fst-normal mb-3">Isikan Jabatan :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                    <input type="text" class="form-control w-50 @error('jabatan') is-invalid @enderror jabatan"
                        id="jabatan" name="jabatan" autocomplete="off" value="{{ $data->jabatan }}">
                </div>

                @if ($errors->has('jabatan'))
                <p class="textJabatan" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('jabatan'))}}
                </p>
                @endif

                <label for="gaji_pokok" class="fst-normal mb-3">Isikan Gaji Pokok :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
                    <select class="form-select @error('gaji_pokok') is-invalid @enderror gaji_pokok"
                        aria-label="Default select example" name="gaji_pokok">
                        <option selected value="{{ $data->gaji_pokok }}">{{ number_format($data->gaji_pokok) }}</option>
                        @for ($i = 5000000; $i <= 10000000; $i +=1000000) <option value="{{ $i }}">{{
                            number_format($i, 0, ',', '.') }}</option>
                            @endfor
                    </select>
                </div>

                @if ($errors->has('gaji_pokok'))
                <p class="textGajiPokok" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('gaji_pokok'))}}
                </p>
                @endif

                <label for="tanggal_masuk" class="fst-normal mb-3">Isikan Tanggal Masuk :</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
                    <input type="date"
                        class="form-control w-50  @error('tanggal_masuk') is-invalid @enderror  tanggal_masuk"
                        id="tanggal_masuk" name="tanggal_masuk" autocomplete="off" value="{{ $data->tanggal_masuk }}">
                </div>

                @if ($errors->has('tanggal_masuk'))
                <p class="textTanggalMasuk" style="font-size: 15px; color:red;">
                    {{ucfirst($errors->first('tanggal_masuk'))}}
                </p>
                @endif

            </div>
        </div>

        <div class="modal-footer mt-3 mb-3">
            <a href="{{url('/app')}}" class="btn btn-danger mx-3">Kembali</a>
            <button type="submit" class="btn btn-warning text-white">Update</button>
        </div>
    </form>
</div>
@endsection