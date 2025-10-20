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
        Schema::table('jadwal_prakteks', function (Blueprint $table) {
            $table->enum('hari', [
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
        ])->after('cabang_id');
    });   
}
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('jadwal_prakteks', function (Blueprint $table) {
            $table->dropColumn('hari');
        });
    }
        
};
