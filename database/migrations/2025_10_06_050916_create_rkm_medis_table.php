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
        Schema::create('rkm_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemeriksaan')->constrained('pemeriksaans')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_pasien')->constrained('users')->onDelete('cascade');
            $table->string('diagnosis')->nullable();
            $table->string('tindakan')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rkm_medis');
    }
};
