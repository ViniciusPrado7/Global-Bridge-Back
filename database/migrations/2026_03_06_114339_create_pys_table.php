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
        Schema::create('pys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freteiro_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('carga_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->date('data_invoice');
            $table->date('data_embarque');
            $table->date('data_entrega');
            $table->string('taxa_especial');
            $table->enum('tipo_taxa', ['taxa_kg', 'taxa_usd', 'taxa_real', 'taxa_unidade', 'frete_fixo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pys');
    }
};