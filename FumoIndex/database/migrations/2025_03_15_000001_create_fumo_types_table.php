<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fumo_types', function (Blueprint $table) {
            $table->id();
            $table->string('fumo_type', 45);
            $table->string('type_description', 255);
            $table->string('type_image', 255);
            $table->boolean('is_primary')->default(true);
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
        });
    }    

    /**
     * Reverse the migrations.
    */

    public function down(): void
    {
        Schema::dropIfExists('fumo_types');
    }
};
