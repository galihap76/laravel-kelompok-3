<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_karyawan', function (Blueprint $table) {
            $table->increments('kode_karyawan');
            $table->string('nama_karyawan');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->integer('kode_pos');
            $table->string('nomor_telepon');
            $table->string('email')->unique();
            $table->string('jabatan');
            $table->decimal('gaji_pokok', $precision = 10, $scale = 0);
            $table->date('tanggal_masuk');
            $table->foreign('jabatan')->references('nama_jabatan')->on('tbl_jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_karyawan');
    }
};
