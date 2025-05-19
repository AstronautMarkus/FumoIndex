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
        Schema::create('fumo_character', function (Blueprint $table) {
            $table->unsignedBigInteger('fumo_id');
            $table->unsignedBigInteger('character_id');
            $table->primary(['fumo_id', 'character_id']);
            $table->foreign('fumo_id')->references('id')->on('fumos')->onDelete('cascade');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fumo_character');
    }
};
