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
        Schema::table('opname', function (Blueprint $table) {
            $table->date('occurred_at')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opname', function (Blueprint $table) {
            $table->timestamp('occurred_at')->nullable()->change();
        });
    }
};
