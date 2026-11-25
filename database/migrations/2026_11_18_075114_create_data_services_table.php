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
    Schema::create('data_services', function (Blueprint $table) {
        $table->id('id_data_service');
        $table->unsignedBigInteger('id_servis');
        $table->string('estimasi_service');
        $table->string('nama_mekanik');
        $table->string('sparepart_pengganti');
        $table->timestamps();

        $table->foreign('id_servis')->references('id_servis')->on('daftar_services')
              ->cascadeOnDelete();
    });
}
public function down(): void { Schema::dropIfExists('data_services'); }
};
