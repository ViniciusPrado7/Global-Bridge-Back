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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('carga_id');
            $table->string('numero_invoice');
            $table->date('data_emissao');
            $table->date('data_vencimento');
            
            $table->string('bill_to');
            $table->string('ship_to');

            $table->enum('moeda', [
                'USDT',
                'USD'
            ]);
            $table->decimal('taxa', 3, 2);
            $table->decimal('descontos', 10, 2);
            $table->decimal('valor_total', 15, 2);
            $table->string('pdf_path');
            $table->text('observacoes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
