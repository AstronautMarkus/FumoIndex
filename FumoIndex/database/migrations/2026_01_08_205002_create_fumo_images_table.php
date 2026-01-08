<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('fumo_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fumo_id');
            $table->string('image_url');
            $table->foreign('fumo_id')->references('id')->on('fumos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('fumo_images');
    }
};
