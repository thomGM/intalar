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
<script>
    var numeroTabelas = 1;

function adicionarTabela() {
  numeroTabelas++;
  
  var tabelaOriginal = document.querySelector("#tabelas-container table");
  var novaTabela = tabelaOriginal.cloneNode(true);
  novaTabela.id = "tabela-" + numeroTabelas;

  var botaoRemover = document.createElement('button');
  botaoRemover.textContent = '-';
  botaoRemover.addEventListener('click', function() {
    novaTabela.remove();
  });

  novaTabela.appendChild(botaoRemover);
  
  document.getElementById('tabelas-container').appendChild(novaTabela);
}
</script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="cadastrar-servico">
                @csrf
                        <table>
                            <tr>
                                <td>Solicitante:</br> <input type="text" name="solicitante" required /></td>
                                <td>Responsável pelo serviço: </br> <input type="text" name="responsavel"required /></td>
                                <td>Data: </br> <input type="date" name="data"required /></td>
                            </tr>
                        </table>
    </br>
                        <p>Equipamento(s)</p>   
    </br>               <div id="tabelas-container">
                        <button id="adicionar-tabela" onclick="adicionarTabela()">+</button>
                            <table id="tabela-1">
                                <tr>
                                    <td>Equipamento: </br> <input type="text" name="equipamento"required /></td>
                                    <td>Marca: </br> <input type="text" name="marca"required /></td>
                                    <td>Modelo: </br> <input type="text" name="modelo" required /></td>
                                    <td>Defeito: </br> <input type="text" name="defeito" required /></td>
                                </tr>
                                <tr>                          
                                    <td colspan="4">Observação: </br><input style="width: 92%; height: 60px;" type="text" name="observacao" /></td>
                                </tr>
                            </table>
                        </div> 
    </br>                  
                        <p>Serviço(s)</p>
    </br>
                        <table>
                            <tr>
                                <td>Hora Inicio: </br><input type="time" name="hinicio"required /></td>
                                <td>Hora Fim: </br><input type="time" name="hfim"required /></td>
                                <td>Atividade: </br><input type="text" name="atividade"required /></td>
                                <td>Técnico: </br><input type="text" name="tecnico"required /></td>
                            </tr>
                        </table>
    </br>
                        <p>Peça(s)</p>
    </br>
                        <table>
                            <tr>
                                <td>Descrição: </br><input type="text" name="pdescricao"required /></td>
                                <td>Preço Unitário: </br><input type="text" name="punidade"required /></td>
                                <td>Quantidade: </br><input type="number" name="pquantidade"required /></td>
                                <td>Valor: <input type="text"/>
                            </tr>
                        </table>
    </br>           
                    Valor Total: </br><input type="text" name="vtotal"required value= "R$ "/>  </br>       
                    <button type="submit">Enviar</button> 
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>