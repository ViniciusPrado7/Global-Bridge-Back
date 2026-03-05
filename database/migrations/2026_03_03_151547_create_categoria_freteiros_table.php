<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('categoria_freteiros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoria')->constrained('categorias')->cascadeOnDelete();
            $table->foreignId('id_freteiro')->constrained('freteiros')
            ->cascadeOnDelete();
            $table->decimal('taxa', 4, 3)->nullable();
            $table->string('moeda');
            $table->decimal('taxa_kg', 4, 3)->nullable();
            $table->decimal('taxa_usd', 4, 3)->nullable();
            $table->decimal('taxa_unidade', 4, 3)->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('categoria__freteiros');
    }
};
