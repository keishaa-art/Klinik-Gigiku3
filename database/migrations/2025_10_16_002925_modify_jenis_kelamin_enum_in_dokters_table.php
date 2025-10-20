<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            // ubah kolom jenis_kelamin menjadi enum
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            // rollback ke string biasa
            $table->string('jenis_kelamin')->change();
        });
    }
};
