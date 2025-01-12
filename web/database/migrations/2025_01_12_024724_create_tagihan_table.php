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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('jumlah_meter');
            $table->string('status', 255)->default('BELUM_LUNAS');
            $table->timestamps();

            $table->unsignedBigInteger('penggunaan_id');
            $table->unsignedBigInteger('user_listrik_id');

            $table->foreign('penggunaan_id')->references('id')->on('penggunaan');
            $table->foreign('user_listrik_id')->references('id')->on('user_listrik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
