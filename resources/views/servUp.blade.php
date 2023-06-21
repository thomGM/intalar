<style>
        table {
            width: 100%;
        }
        p {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
</style>        

<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Servico;

$request = Request::capture();
$id = $request->input('id');

$OrdemServico = DB::table('ordem_servico as Servico')
                   ->leftJoin('equipamento as eq', 'Servico.id', '=', 'eq.id_servico')
                   ->leftJoin('servicos as s', 'Servico.id', '=', 's.id_servico')
                   ->leftJoin('pecas as p', 'Servico.id', '=', 'p.id_servico')
                   ->where('Servico.id', '=', $id)
                   ->first(['Servico.*', 'eq.*', 's.*', 'p.*']);


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
                <form method="POST" action="atualizar-servico">
                @csrf
                <input type="hidden" name="id" value="<?= $id ?>">
                        <table>
                            <tr>
                                <td>Solicitante:</br> <input type="text" name="solicitante" required value="<?=$OrdemServico->solicitante;?>"/></td>
                                <td>Responsável pelo serviço: </br> <input type="text" name="responsavel"required value="<?=$OrdemServico->responsavel_servico;?>"/></td>
                                <td>Data: </br> <input type="date" name="data"required value="<?=$OrdemServico->data;?>"/></td>
                            </tr>
                        </table>
    </br>
                        <p>Equipamento(s)</p>   
    </br> 
                        <table>
                            <tr>
                                <td>Equipamento: </br> <input type="text" name="equipamento"required value="<?=$OrdemServico->equipamento;?>"/></td>
                                <td>Marca: </br> <input type="text" name="marca"required value="<?=$OrdemServico->marca;?>"/></td>
                                <td>Modelo: </br> <input type="text" name="modelo" required value="<?=$OrdemServico->modelo;?>"/></td>
                                <td>Defeito: </br> <input type="text" name="defeito" required value="<?= $OrdemServico->defeito;?>"/></td>
                            </tr>
                            <tr>                          
                                <td colspan="4">Observação: </br><input style="width: 92%; height: 60px;" type="text" name="observacao" value="<?=$OrdemServico->observacao;?>"/></td>
                            </tr>
                        </table> 
    </br>                  
                        <p>Serviço(s)</p>
    </br>
                        <table>
                            <tr>
                                <td>Hora Inicio: </br><input type="time" name="hinicio"required value="<?=$OrdemServico->hora_ini;?>"/></td>
                                <td>Hora Fim: </br><input type="time" name="hfim"required value="<?=$OrdemServico->hora_fim?>"/></td>
                                <td>Atividade: </br><input type="text" name="atividade"required value="<?=$OrdemServico->Atividade;?>"/></td>
                                <td>Técnico: </br><input type="text" name="tecnico"required value="<?=$OrdemServico->tecnico;?>"/></br></td>
                            </tr>
                        </table>
    </br>
                        <p>Peça(s)</p>
    </br>
                        <table>
                            <tr>
                                <td>Descrição: </br><input type="text" name="pdescricao"required value="<?=$OrdemServico->descricao;?>"/></td>
                                <td>Preço Unitário: </br><input type="text" name="punidade"required value="<?=$OrdemServico->valor_unitario;?>"/></td>
                                <td>Quantidade: </br><input type="number" name="pquantidade"required value="<?=$OrdemServico->quantidade;?>"/></td>
                                <td>Valor: <input type="text"/>
                            </tr>
                        </table>
    </br>               
                        Valor Total: </br><input type="text" name="vtotal"required value="<?=$OrdemServico->vtotal;?>"/> </br>
                        <button type="submit">Salvar</button> 
                    </form>
             
                </div>
            </div>
        </div>
    </div>
</x-app-layout>