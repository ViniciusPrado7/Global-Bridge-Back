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
        Schema::create('embarques', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->foreignId('carga_id')->nullable();
            $table->string('rota');
            $table->foreignId('freteiro_id'); //FK
            $table->date('data_embarque');
            $table->date('data_entrega')->nullable(); // if empty value
            $table->enum('status', [
                'Aguardando MI',
                'Recebido MI',
                'Em transito MY-PY',
                'Recebido PY',
                'Conferido PY',
                'Em transito PY-SP',
                'Recebido SP',
                'Conferido SP',
                'Finalizada'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('embarques');
    }
};
