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
        Schema::create('input_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->foreignId('suppliers_id')->constrained('suppliers')->onDelete('cascade');
            $table->integer('stock')->default('0');
            $table->integer('store')->default('0');
            $table->date('tanggal_input');
            $table->string('fotoInvoiceInput');
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
        Schema::dropIfExists('input_barangs');
    }
};
