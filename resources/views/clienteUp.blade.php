<?php
use Illuminate\Http\Request;
use App\Models\Cliente;

$request = Request::capture();
$id = $request->input('id');

$cliente = Cliente::where('id', $id)->first();

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="atualizar-cliente">
                @csrf

                    <input type="hidden" name="id" value="<?= $id ?>">
                    Nome: <input type="text" name="nomecliente" required value="<?=$cliente->nome?>"/></br>
                    CPF/CNPJ: <input type="number" name="idcliente"required value="<?=$cliente->cpf_cnpj?>"/></br>
                    Aniversário: <input type="date" name="aniversario" required value="<?=$cliente->aniversario?>"/></br>
                    Celular: <input type="number" name="numerocliente"required value="<?= $cliente->celular?>"/></br>
                    E-mail: <input type="text" name="emailcliente"required value="<?=$cliente->email?>"/></br></br>
                    <h2>Endereço</h2> 
                    CEP: <input type="number" name="cepcliente"required value="<?=$cliente->cep?>"/></br>
                    Rua: <input type="text" name="ruacliente"required value="<?=$cliente->rua?>"/></br>
                    Número: <input type="number" name="numenderecocliente"required value="<?=$cliente->numero?>"/></br>
                    Bairro: <input type="text" name="bairrocliente"required value="<?=$cliente->bairro?>"/></br>
                    Cidade: <input type="text" name="cidadecliente"required value="<?=$cliente->cidade?>"/></br>
                    <button type="submit">Salvar</button>    
                </form>
             
                </div>
            </div>
        </div>
    </div>
</x-app-layout>