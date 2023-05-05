<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->date('aniversario');
            $table->string('nome');
            $table->string('cpf_cnpj');
            $table->bigInteger('celular')->unsigned();
            $table->string('email');
            $table->integer('cep')->unsigned();     
            $table->string('rua');
            $table->integer('numero')->unsigned();        
            $table->string('bairro');
            $table->string('cidade'); 
        });
    }
}

