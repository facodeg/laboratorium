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
        Schema::create('tb_masuk_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('tb_barang');
            $table->string('no_faktur');
            $table->date('tanggal_masuk');
            $table->integer('jumlah');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_masuk_barang');
    }
};
