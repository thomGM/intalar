<?php
use Illuminate\Http\Request;
use App\Models\Servico;

$request = Request::capture();
$id = $request->input('id', '');

$OrdemServico = Servico::where('id', $id)->first();

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @csrf
                <form>
                        Solicitante: <input type="text" name="solicitante" required value="<?=$OrdemServico->solicitante;?>"/></br>
                        Responsável pelo serviço: <input type="text" name="responsavel"required value="<?=$OrdemServico->responsavel_servico;?>"/></br>
                        Defeito: <input type="text" name="defeito" required value="<?= $OrdemServico->defeito;?>"/></br>
                        Observação: <input type="text" name="observacao"required value="<?=$OrdemServico->observacao;?>"/></br>
                        Marca: <input type="text" name="marca"required value="<?=$OrdemServico->marca;?>"/></br>
                        Modelo: <input type="text" name="modelo" required value="<?=$OrdemServico->modelo;?>"/></br></br>
                        <h2>Serviços</h2> 
                        Hora Inicio: <input type="time" name="hinicio"required value="<?=$OrdemServico->hora_ini;?>"/></br>
                        Hora Fim: <input type="time" name="hfim"required value="<?=$OrdemServico->hora_fim?>"/></br>
                        Atividade: <input type="text" name="atividade"required value="<?=$OrdemServico->Atividade;?>"/></br>
                        Técnico: <input type="text" name="tecnico"required value="<?=$OrdemServico->tecnico;?>"/></br>
                        Data: <input type="date" name="data"required value="<?=$OrdemServico->data;?>"/></br></br>
                        <h2>Peças</h2>
                        Descrição: <input type="text" name="pdescricao"required value="<?=$OrdemServico->descricao;?>"/></br>
                        Tipo: <input type="text" name="peca"required value="<?=$OrdemServico->pecas;?>"/></br>
                        Preço Unitário: <input type="text" name="punidade"required value="<?=$OrdemServico->valor_unitario;?>"/></br>
                        Quantidade: <input type="number" name="pquantidade"required value="<?=$OrdemServico->quantidade;?>"/></br>
                        Valor: <input type="text" name="vtotal"required value="<?=$OrdemServico->valortotal;?>"/></br>
    
                        <button type="submit">Salvar</button>    
                    </form>
             
                </div>
            </div>
        </div>
    </div>
</x-app-layout>