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
        Schema::create('sampel', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sampel')->unique();
            $table->string('nama_sampel');
            $table->date('tanggal_pengambilan')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('jenis_sampel')->nullable();
            $table->enum('status_sampel', ['Belum Diuji', 'Sedang Diuji', 'Selesai'])->nullable()->default('Belum Diuji');
            $table->string('lokasi_penyimpanan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampel');
    }
};
