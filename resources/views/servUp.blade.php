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
                   ->Join('equipamento as eq', 'Servico.id', '=', 'eq.id_servico')
                   ->Join('servicos as s', 'Servico.id', '=', 's.id_servico')
                   ->Join('pecas as p', 'Servico.id', '=', 'p.id_servico')
                   ->where('Servico.id', '=', $id)
                   ->get(['Servico.*', 'eq.*', 's.*', 'p.*', 'eq.id as id_equipamento', 's.id as id_servico', 'p.id as id_pecas']);
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
                                <td>Solicitante:</br> <input type="text" name="solicitante" required value="<?=$OrdemServico[0]->solicitante;?>"/></td>
                                <td>Responsável pelo serviço: </br> <input type="text" name="responsavel"required value="<?=$OrdemServico[0]->responsavel_servico;?>"/></td>
                                <td>Data: </br> <input type="date" name="data"required value="<?=$OrdemServico[0]->data;?>"/></td>
                            </tr>
                        </table>
                        </br>
                        <p>Equipamento(s)</p>   
                        </br> 
                            <div id="tabelas-container">
                                <button id="adicionar-tabela" onclick="adicionarTabela()">+</button>
                                <table id="tabela-1">
                                    <?php foreach ($OrdemServico as $Ordem) { ?>
                                        <tr>
                                            <td><input type="hidden" name="id_equipamento[]" value="<?= $Ordem->id_equipamento?>"/></td>
                                            <td>Equipamento: </br> <input type="text" name="equipamento[]"  required value="<?=$Ordem->equipamento;?>"/></td>
                                            <td>Marca: </br> <input type="text" name="marca[]"  required value="<?=$Ordem->marca;?>"/></td>
                                            <td>Modelo: </br> <input type="text" name="modelo[]"  required value="<?=$Ordem->modelo;?>"/></td>
                                            <td>Defeito: </br> <input type="text" name="defeito[]"  required value="<?= $Ordem->defeito;?>"/></td>
                                        </tr>
                                        <tr>                          
                                            <td colspan="4">Observação: </br><input style="width: 92%; height: 60px;" type="text" name="observacao[]"  value="<?=$Ordem->observacao;?>"/></td>
                                        </tr>
                                    <?php } ?>
                                </table> 
                            </div>
                        </br>                  
                        <p>Serviço(s)</p>
                        </br>
                        <div id="tabela-servico">
                            <button id="adicionar-servico" onclick="adicionarServico()">+</button>
                            <table id="servico-1">
                                <?php foreach ($OrdemServico as $Ordem) { ?>
                                    <tr>
                                        <td><input type="hidden" name="id_servico[]" value="<?= $Ordem->id_servico ?>"/></td>
                                        <td>Hora Inicio: </br><input type="time" name="hinicio[]"  required value="<?=$Ordem->hora_ini;?>"/></td>
                                        <td>Hora Fim: </br><input type="time" name="hfim[]"  required value="<?=$Ordem->hora_fim?>"/></td>
                                        <td>Atividade: </br><input type="text" name="atividade[]"  required value="<?=$Ordem->Atividade;?>"/></td>
                                        <td>Técnico: </br><input type="text" name="tecnico[]"  required value="<?=$Ordem->tecnico;?>"/></br></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        </br>
                        <p>Peça(s)</p>
                        </br>
                        <div id="tabela-pecas">
                            <button id="adicionar-pecas" onclick="adicionarPecas()">+</button>
                            <table id="peca-1">
                                <?php foreach ($OrdemServico as $Ordem) { ?>
                                    <tr>
                                        <td><input type="hidden" name="id_pecas[]" value="<?= $Ordem->id_pecas ?>"/></td>
                                        <td>Descrição: </br><input type="text" name="pdescricao[]" required value="<?=$Ordem->descricao;?>"/></td>
                                        <td>Preço Unitário: </br><input type="text" name="punidade[]" required value="<?=$Ordem->valor_unitario;?>"/></td>
                                        <td>Quantidade: </br><input type="number" name="pquantidade[]" required value="<?=$Ordem->quantidade;?>"/></td>
                                        <td>Valor: <input type="text"/></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        </br>               
                        Valor Total: </br><input type="text" name="vtotal"required value="<?=$OrdemServico[0]->vtotal;?>"/> </br>
                        <button type="submit">Salvar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    let tabelaCount = 1;

    function adicionarTabela() {
        tabelaCount++;
        const tabelaContainer = document.getElementById('tabelas-container');

        const novaTabela = document.createElement('table');
        novaTabela.id = 'tabela-' + tabelaCount;

        const novaLinha = document.createElement('tr');
        novaLinha.innerHTML = `
            <td><input type="hidden" name="id_equipamento[]" value="0"/></td>
            <td>Equipamento: <br> <input type="text" name="equipamento[]" required></td>
            <td>Marca: <br> <input type="text" name="marca[]" required></td>
            <td>Modelo: <br> <input type="text" name="modelo[]" required></td>
            <td>Defeito: <br> <input type="text" name="defeito[]" required></td>
            <td><button onclick="removerTabela(this)">-</button></td>
        `;

        const observacaoLinha = document.createElement('tr');
        observacaoLinha.innerHTML = `
            <td colspan="4">Observação: <br><input style="width: 92%; height: 60px;" type="text" name="observacao[]"></td>
        `;

        novaTabela.appendChild(novaLinha);
        novaTabela.appendChild(observacaoLinha);
        tabelaContainer.appendChild(novaTabela);
    }

    function removerTabela(botao) {
        const tabela = botao.parentNode.parentNode.parentNode; // Obtém a tabela pai do botão
        tabela.remove();
    }

    let servicoCount = 1;

    function adicionarServico() {
        servicoCount++;
        const tabelaServico = document.getElementById("tabela-servico");
        const novoServico = document.createElement('table');
        novoServico.id = 'servico-' + servicoCount;

        const novaLinhaServico = document.createElement('tr');
        novaLinhaServico.innerHTML =
            `<td><input type="hidden" name="id_servico[]" value="0"/></td>
            <td>Hora Inicio: <br><input type="time" name="hinicio[]" required></td>
            <td>Hora Fim: <br><input type="time" name="hfim[]" required></td>
            <td>Atividade: <br><input type="text" name="atividade[]" required></td>
            <td>Técnico: <br><input type="text" name="tecnico[]" required></td>
            <td><button onclick="removerServico(this)">-</button></td>`;

        tabelaServico.appendChild(novoServico);
        novoServico.appendChild(novaLinhaServico);

    }

    function removerServico(botao) {
        const excluiServ = botao.parentNode.parentNode.parentNode; // Obtém a tabela pai do botão
        excluiServ.remove();
    }

    let pecasCount = 1;

    function adicionarPecas(){
        pecasCount++;

        const tabelaPecas = document.getElementById("tabela-pecas");
        const novaPeca = document.createElement('table');
        novaPeca.id = 'peca-' + pecasCount;

        const novaLinhaPeca = document.createElement('tr');
        novaLinhaPeca.innerHTML = 
            `<td><input type="hidden" name="id_pecas[]" value="0"/></td>
            <td>Descrição: </br><input type="text" name="pdescricao[]"required /></td>
            <td>Preço Unitário: </br><input type="text" name="punidade[]"required /></td>
            <td>Quantidade: </br><input type="number" name="pquantidade[]"required /></td>
            <td>Valor: <input type="text"/></td>
            <td><button onclick="removerPeca(this)">-</button></td>`;

        tabelaPecas.appendChild(novaPeca);
        novaPeca.appendChild(novaLinhaPeca);

    }

    function removerPeca(botao) {
        const excluiPeca = botao.parentNode.parentNode.parentNode; // Obtém a tabela pai do botão
        excluiPeca.remove();
    }
</script>
