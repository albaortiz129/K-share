<?php
//muestra lo que el usuario tiene y lo que busca
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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //persona que publica el intercambio
            $table->foreignId('have_card_id')->constrained('photocards')->onDelete('cascade'); //la carta que ofrece
            $table->foreignId('want_card_id')->constrained('photocards')->onDelete('cascade'); //la carta que quiere
            $table->text('description')->nullable(); //descripcion de la carta
            $table->boolean('is_active')->default(true); //intercambio disponible o no
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
