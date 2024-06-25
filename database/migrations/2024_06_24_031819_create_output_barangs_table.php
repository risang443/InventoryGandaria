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
        Schema::create('output_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->foreignId('costumers_id')->constrained('costumers')->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('tanggal_output');
            $table->string('fotoInvoiceOutput');
            $table->text('keterangan');

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_barang')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('output_barangs');
    }
};
