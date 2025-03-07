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
            $table->foreignId('etablishment_id')->constrained('etablishments')->onDelete('cascade'); // Référence vers `establishments`
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Référence vers `clients`
            $table->text('comment'); // Commentaire du client
            $table->integer('rating')->default(0); // Note (échelle de 1 à 5)
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