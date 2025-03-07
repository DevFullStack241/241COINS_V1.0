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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom complet du propriétaire
            $table->string('username')->unique()->nullable(); // Nom d'utilisateur unique
            $table->string('email')->unique(); // Adresse email unique
            $table->string('password'); // Mot de passe sécurisé
            $table->date('date_naissance')->nullable(); // Date de naissance
            $table->string('address')->nullable(); // Adresse du propriétaire
            $table->string('profession')->nullable(); // Profession du propriétaire
            $table->string('phone')->nullable(); // Numéro de téléphone
            $table->string('picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['En attente', 'En revue', 'Active'])->default('En attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};