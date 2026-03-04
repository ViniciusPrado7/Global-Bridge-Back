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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            // Garante que o pagamento esteja vinculado a uma carga existente
            $table->foreignId('carga_id')->constrained('cargas')->cascadeOnDelete();
  
            $table->string('tipo_moeda'); // USD ou USDT
            $table->decimal('valor', 15, 2);
            $table->decimal('taxa', 15, 4);
            $table->decimal('valor_liquido', 15, 2);
            $table->string('usdt_hash')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};