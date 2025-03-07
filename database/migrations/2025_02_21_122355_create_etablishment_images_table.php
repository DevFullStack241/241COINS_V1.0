<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('etablishment_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etablishment_id')->constrained('etablishments')->onDelete('cascade'); // Référence vers `establishments`
            $table->string('image_url'); // URL de l'image
            $table->enum('image_type', ['menu', 'plat', 'interieur', 'autre']); // Type d'image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etablishment_images');
    }
};
