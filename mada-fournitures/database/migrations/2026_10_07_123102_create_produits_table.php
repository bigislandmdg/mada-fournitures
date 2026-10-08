<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();
            $table->string('nom');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('unite')->default('pièce');
            $table->decimal('prix_indicatif', 12, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('actif')->default(true);
            $table->timestamps();

            $table->index('actif');
            $table->index('categorie_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};