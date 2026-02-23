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
        Schema::create('carga_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carga_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('descricao');
            $table->string('categoria');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carga_items');
    }
};
