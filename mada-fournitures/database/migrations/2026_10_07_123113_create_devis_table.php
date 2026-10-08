<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('nom_client');
            $table->string('societe')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->text('adresse')->nullable();
            $table->text('message')->nullable();
            $table->enum('statut', ['nouveau', 'en_cours', 'traite', 'refuse'])
                  ->default('nouveau');
            $table->timestamps();

            $table->index('statut');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};