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
        Schema::create('cargas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('invoice');
            $table->string('metodo_entrega');
            $table->string('local_embarque');
            $table->string('destino');
            $table->date('data_recebimento');
            $table->date('data_prevista_embarque');
            $table->integer('volumes');
            $table->decimal('peso', 10, places: 2);
            $table->text('shipper_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};
