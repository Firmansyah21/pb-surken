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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('juara')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('anggota_id')->nullable()->constrained('anggota')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreignId('kategori_id')->nullable()->constrained('kategoris')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
