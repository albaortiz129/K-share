<?php
//pantalla de notificaciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //delivery channels
            $table->boolean('email_channels')->default(true); 
            $table->boolean('push_channels')->default(true); 
            $table->boolean('in_app_channels')->default(true); 
            //notification categories
            $table->boolean('notify_new_trades')->default(true);
            $table->boolean('notify_price_alerts')->default(true);
            $table->boolean('notify_messages')->default(true);
            $table->boolean('notify_community_updates')->default(true);
            //quiet hours
            $table->time('quiet_hours_start')->nullable(); //hora de inicio de descanso
            $table->time('quiet_hours_end')->nullable(); //hora fin de descanso
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_settings');
    }
};
