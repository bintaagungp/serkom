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
        Schema::create('user_listrik', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kwh', 255);
            $table->text('alamat');
            $table->timestamps();

            $table->unsignedBigInteger('tarif_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('tarif_id')->references('id')->on('tarif')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_listrik');
    }
};
