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
        Schema::create('ordem_servico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('solicitante');
            $table->string('responsavel_servico');
            $table->string('defeito');
            $table->string('marca');
            $table->string('modelo');
            $table->time('hora_ini');
            $table->time('hora_fim');
            $table->string('Atividade');
            $table->string('tecnico');
            $table->string('descricao');
            $table->string('pecas');
            $table->string('valor_unitario');
            $table->string('quantidade');
            $table->string('valortotal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_servico');
    }
};
