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
        Schema::create('jadwal_latihans', function (Blueprint $table) {
            $table->id();
            $table->string('hari')->nullable();
            $table->time('jam')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('lokasi')->nullable();
            $table->unsignedBigInteger('pelatih_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('anggota_id')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_latihans');
    }
};
