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
            $table->string('nama_karyawan', 100);
            $table->string('alamat', 255);
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->integer('kode_pos');
            $table->mediumInteger('nomor_telepon');
            $table->string('email', 100)->unique();
            $table->string('jabatan', 100);
            $table->decimal('gaji_pokok', $precision = 10, $scale = 2);
            $table->date('tanggal_masuk');
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
