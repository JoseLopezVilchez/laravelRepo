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
        Schema::table('ejemplos', function (Blueprint $table) {
            $table->unsignedBigInteger('tenedor_id')->nullable();
            $table->foreign('tenedor_id')->references('id')->on('ejemplo_tenedors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ejemplos', function (Blueprint $table) {
            $table->dropForeign('tenedor_id');
            $table->dropColumn('tenedor_id');
        });
    }
};
