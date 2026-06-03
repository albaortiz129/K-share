<?php
//market de ventas
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//vendedor
            $table->foreignId('photocard_id')->constrained()->onDelete('cascade');//carta a la venta
            $table->decimal('price', 8, 2); //precio
            $table->string('currency')->default('EUR'); //divisa
            $table->text('description')->nullable();
            $table->boolean('is_sold')->default(false); // Para marcar si ya se vendió y ocultarla
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
