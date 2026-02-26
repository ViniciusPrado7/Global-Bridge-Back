<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();

            $table->foreignId('cliente_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('freteiro_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();

            $table->string('status')->default('aguardando');
            $table->string('metodo_entrega');
            $table->string('pais_origem');
            $table->string('pais_destino');
            $table->string('moeda')->default('USD');
            $table->date('data_recebimento');
            $table->date('data_prevista_embarque');
            $table->integer('volumes')->default(0);
            $table->decimal('peso', 10, 2);
            $table->text('shipper_information')->nullable();
            $table->decimal('valor_total', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};
