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
        Schema::create('farmasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('kode_obat');
            $table->string('kandungan');
            $table->enum('bentuk_obat', ['Obat Kumur', 'Obat Oles', 'Obat Minum', 'Obat Suntik']);
            $table->integer('satuan');
            $table->integer('pieces');
            $table->date('tgl_produksi');
            $table->date('tgl_kadaluarsa');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
