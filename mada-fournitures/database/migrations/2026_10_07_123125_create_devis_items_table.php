<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devis_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devis_id')
                  ->constrained('devis')
                  ->cascadeOnDelete();
            $table->foreignId('produit_id')
                  ->constrained('produits')
                  ->cascadeOnDelete();
            $table->integer('quantite')->default(1);
            $table->text('remarque')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devis_items');
    }
};