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
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('spesifikasi');
            $table->unsignedBigInteger('id_satuan');
            $table->unsignedBigInteger('id_category');
            $table->timestamps();
            $table->foreign('id_satuan')->references('id')->on('tb_satuan');
            $table->foreign('id_category')->references('id')->on('tb_categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
