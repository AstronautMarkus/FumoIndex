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
        Schema::create('fumos', function (Blueprint $table) {
            $table->id();
            $table->string('fumo_name', 45);
            $table->foreignId('type_id')->constrained('fumo_types')->onDelete('cascade');
            $table->integer('price_jpy');
            $table->text('notes')->nullable();
            $table->text('product_url')->nullable();
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fumos');
    }
};
