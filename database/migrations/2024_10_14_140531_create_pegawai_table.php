<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('noKTP')->unique();
            $table->string('noHP')->unique();
            $table->string('alamat');
            $table->string('nomor_izin');
            $table->string('lokasi_izin');
            $table->string('noSK');
            $table->date('tanggalSK');
            $table->date('expiredSK');
            $table->string('namaKelurahan');
            $table->string('namaKecamatan');
            $table->string('namaIzin');
            $table->string('tipePermohonan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
