<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;

    protected $table = "tbl_karyawan";
    protected $primaryKey = 'kode_karyawan';

    protected $fillable = [
        'nama_karyawan',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'nomor_telepon',
        'email',
        'jabatan',
        'gaji_pokok',
        'tanggal_masuk'
    ];

    public $timestamps = false;
}
