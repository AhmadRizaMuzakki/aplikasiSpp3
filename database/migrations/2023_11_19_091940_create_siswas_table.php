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
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->unique()->primary();
            $table->char('nis', 10);
            $table->string('nama', 35);
            $table->string('password');
            $table->unsignedBigInteger('id_kelas');

            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade')->onUpdate('cascade');

            $table->text('alamat');
            $table->string('no_telp', 13);

            $table->unsignedBigInteger('id_spp');
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
