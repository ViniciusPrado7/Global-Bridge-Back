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
        Schema::create('freteiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('bill_to');
            $table->string('ship_to');
            $table->string('grupo');
            $table->string('telefone');
            $table->decimal('taxa_MIA_PY', 10, 3);
             $table->decimal('taxa_PY_SP', 10, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freteiros');
    }
};
