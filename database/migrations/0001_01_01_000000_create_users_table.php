<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('siret')->nullable();
            $table->string('sia')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->string('adresse')->nullable();
            $table->string('adresse_siege')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('telephone_mobile')->nullable();

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

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
