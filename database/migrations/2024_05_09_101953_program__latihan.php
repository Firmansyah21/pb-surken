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
        Schema::create('program_latihan', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('jam')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('program')->nullable();
            $table->string('keterangan')->nullable();
            $table->foreignId('anggota_id')->nullable()->constrained('anggota')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program__latihan');
    }
};
