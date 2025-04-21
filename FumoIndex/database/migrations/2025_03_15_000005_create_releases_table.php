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
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fumo_id');
            $table->date('release_date');
            $table->enum('release_type', ['standard', 'limited', 'exclusive', 'limited + exclusive', 'event-only']);
            $table->string('country');
            $table->string('seller');
            $table->integer('price_jpy');
            $table->decimal('price_usd', 10, 2)->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('fumo_id')->references('id')->on('fumos')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releases');
    }
};
