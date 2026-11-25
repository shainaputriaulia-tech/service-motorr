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
    Schema::create('pelanggans', function (Blueprint $table) {
        $table->id('id_pelanggan');
        $table->string('nama_lengkap');
        $table->string('no_hp', 20);
        $table->text('alamat');
        $table->string('pekerjaan');
        $table->timestamps();
    });
}
public function down(): void { Schema::dropIfExists('pelanggans'); }
};
