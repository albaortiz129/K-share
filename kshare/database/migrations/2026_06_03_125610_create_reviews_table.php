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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade'); //el que deja la reseña
            $table->foreignId('reviewed_id')->constrained('users')->onDelete('cascade'); //el que recibe la reseña
            $table->unsignedTinyInteger('stars'); //numero del 1 al 5 para puntuacion
            $table->text('comment')->nullable(); //comentario que quiera dejar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
