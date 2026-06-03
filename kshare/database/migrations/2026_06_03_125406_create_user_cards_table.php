<?php
//pestaña collection del perfil, une al usuario con las cartas que tiene
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
        Schema::create('user_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//dueño de la carta
            $table->foreignId('photocard_id')->constrained()->onDelete('cascade');//que carta es
            $table->enum('status',['collection', 'for_trade', 'for_sale'])->default('collection'); //donde se muestra la carta
            $table->string('condition')->default('Mint'); //estado de la carta: mint(perfecta), near mint(casi perfecta), excellent/lightly played (alguna marca), damaged (daño evidente)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_cards');
    }
};
