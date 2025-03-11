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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etablishment_id')->constrained()->onDelete('cascade'); // L'établissement concerné
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('cascade'); // Si c'est un client qui commente
            $table->foreignId('owner_id')->nullable()->constrained()->onDelete('cascade'); // Si c'est le propriétaire qui répond
            $table->text('content'); // Contenu du commentaire
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // Réponse à un commentaire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
