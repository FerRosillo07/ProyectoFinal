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
        Schema::create('agregar_canciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cancion')->constrained('canciones')->onDelete('cascade');
            $table->foreignId('id_playlist')->constrained('playlists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agregar_canciones');
    }
};
