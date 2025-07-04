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
        Schema::create('articles', function (Blueprint $table) {
    $table->id();
    $table->string('nom');
    $table->text('description');
    $table->string('image')->nullable(); // pour le chemin vers l'image
    $table->timestamps();
    $table->decimal('prix', 8, 2)->nullable();

});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
