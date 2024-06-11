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
        Schema::create('opname', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->string('status');
            $table->integer('quantity');
            $table->timestamp('occurred_at')->nullable(); // Mengizinkan tanggal yang ditentukan oleh penggunas
            $table->text('keterangan');
            $table->timestamps();


            $table->foreign('id_barang')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opname');
    }
};
