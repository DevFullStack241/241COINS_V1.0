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
        Schema::create('etablishments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'établissement
            $table->text('description')->nullable(); // Description détaillée
            $table->string('address'); // Adresse complète
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade'); // Clé étrangère vers les propriétaires
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Clé étrangère vers la catégorie
            $table->string('opening_hours')->nullable(); // Stockage en texte simple
            $table->enum('status', ['ouvert', 'fermer'])->default('ouvert'); // Statut de l'établissement
            $table->string('phone_whatsapp')->nullable(); // Numéro WhatsApp
            $table->string('phone_service')->nullable(); // Numéro de service client
            $table->string('website')->nullable(); // Site web de l'établissement
            $table->string('email')->unique()->nullable(); // Email de contact
            $table->string('services')->nullable(); // Services proposés sous forme de texte
            $table->string('cover_image')->nullable(); // Image de couverture
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude pour la géolocalisation
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude pour la géolocalisation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablishments');
    }
};