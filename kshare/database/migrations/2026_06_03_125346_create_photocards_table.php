<?php
//Todas las cartas que existen en el mercado
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
        Schema::create('photocards', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->string('idol_name');
            $table->string('rarity');
            $table->string('album_era');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photocards');
    }
};
