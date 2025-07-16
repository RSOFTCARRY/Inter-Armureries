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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('email')->nullable();
            $table->text('message')->nullable();

            // Infos société facultatives si besoin
            $table->string('siret')->nullable();
            $table->string('sia')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->string('prenom')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('telephone_mobile')->nullable();
            $table->string('adresse_siege')->nullable();

            // Documents fournis par l'utilisateur (facultatif pour un contact)
            $table->string('doc_autorisation')->nullable();
            $table->date('validite_autorisation')->nullable();
            $table->string('doc_afci')->nullable();
            $table->date('validite_afci')->nullable();
            $table->string('doc_diplome')->nullable();
            $table->date('validite_diplome')->nullable();
            $table->string('doc_agrement')->nullable();
            $table->date('validite_agrement')->nullable();
            $table->string('doc_kbis')->nullable();
            $table->date('validite_kbis')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
