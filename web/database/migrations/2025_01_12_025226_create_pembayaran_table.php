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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal_pembayaran', 5);
            $table->integer('biaya_admin');
            $table->integer('total_bayar');
            $table->timestamps(5);

            $table->unsignedBigInteger('tagihan_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('tagihan_id')->references('id')->on('tagihan')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
