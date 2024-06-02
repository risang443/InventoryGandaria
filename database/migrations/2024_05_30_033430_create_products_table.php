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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id_barang')->primary(); // Set id_barang as primary key
            $table->string('namabarang');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('harga');
            $table->enum('ketersedian',['tersedia','tidak_tersedia']);
            $table->integer('stok')->default(0);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};