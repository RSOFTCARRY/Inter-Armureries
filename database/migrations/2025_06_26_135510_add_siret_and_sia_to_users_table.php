<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Partie 2 : Détails utilisateur
            $table->string('prenom')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('telephone_mobile')->nullable();
            $table->string('adresse_siege')->nullable(); // Renseigné par admin au besoin

            // Partie 3 : Documents et dates de validité
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
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'prenom', 'telephone_fixe', 'telephone_mobile', 'adresse_siege',
                'doc_autorisation', 'validite_autorisation',
                'doc_afci', 'validite_afci',
                'doc_diplome', 'validite_diplome',
                'doc_agrement', 'validite_agrement',
                'doc_kbis', 'validite_kbis',
            ]);
        });
    }
};
