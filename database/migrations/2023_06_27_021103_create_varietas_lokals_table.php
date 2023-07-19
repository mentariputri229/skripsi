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
        Schema::create('varietas_lokals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('usaha_id')->nullable();
            $table->foreign('usaha_id')->references('id')->on('usahas')->onDelete('restrict');
            $table->unsignedBigInteger('produsen_id')->nullable();
            $table->foreign('produsen_id')->references('id')->on('produsens')->onDelete('restrict');
            $table->string('nomor_surat', 30)->nullable();
            $table->string('jenis_benih', 30);
            $table->string('benih_usaha', 30);
            $table->string('kelas_benih', 30)->nullable();
            $table->string('persyaratan');
            $table->date('tanggal')->nullable();
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varietas_lokals');
    }
};
