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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

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
                <form id="enviarFormulario" method="POST" action="cadastrar-servico">
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
                                    <td>Equipamento: </br> <input type="text" name="equipamento[]"required /></td>
                                    <td>Marca: </br> <input type="text" name="marca[]"required /></td>
                                    <td>Modelo: </br> <input type="text" name="modelo[]" required /></td>
                                    <td>Defeito: </br> <input type="text" name="defeito[]" required /></td>
                                </tr>
                                <tr>                          
                                    <td colspan="4">Observação: </br><input style="width: 92%; height: 60px;" type="text" name="observacao[]" /></td>
                                </tr>
                            </table>
                        </div> 
    </br>                  
                        <p>Serviço(s)</p>
    </br>
                        <div id="tabela-servico">
                        <button id="adicionar-servico" onclick="adicionarServico()">+</button>
                        <table id="servico-1">
                            <tr>
                                <td>Hora Inicio: </br><input type="time" name="hinicio[]"required /></td>
                                <td>Hora Fim: </br><input type="time" name="hfim[]"required /></td>
                                <td>Atividade: </br><input type="text" name="atividade[]"required /></td>
                                <td>Técnico: </br><input type="text" name="tecnico[]"required /></td>
                            </tr>
                        </table>
                        </div>
    </br>
                        <p>Peça(s)</p>
    </br>
                        <div id="tabela-pecas">
                            <button id="adicionar-pecas" onclick="adicionarPecas()">+</button>
                        <table id="peca-1">
                            <tr>
                                <td>Descrição: </br><input type="text" name="pdescricao[]"required /></td>
                                <td>Preço Unitário: </br><input type="text" name="punidade[]"required /></td>
                                <td>Quantidade: </br><input type="number" name="pquantidade[]"required /></td>
                                <td>Valor: <input type="text"/>
                            </tr>
                        </table>
                        </div>
    </br>           
                    Valor Total: </br><input type="text" name="vtotal"required value= "R$ "/>  </br>       
                    <button type="submit">Enviar</button> 
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
        `<td>Hora Inicio: <br><input type="time" name="hinicio[]" required></td>
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
        novaPeca.id = 'peca-'.pecasCount;

        const novaLinhaPeca = document.createElement('tr');
        novaLinhaPeca.innerHTML = 
            `<td>Descrição: </br><input type="text" name="pdescricao[]"required /></td>
            <td>Preço Unitário: </br><input type="text" name="punidade[]"required /></td>
            <td>Quantidade: </br><input type="number" name="pquantidade[]"required /></td>
            <td>Valor: <input type="text"/>
            <td><button onclick="removerPeca(this)">-</button></td>`;

        tabelaPecas.appendChild(novaPeca);
        novaPeca.appendChild(novaLinhaPeca);

    }

    function removerPeca(botao) {
        const excluiPeca = botao.parentNode.parentNode.parentNode; // Obtém a tabela pai do botão
        excluiPeca.remove();
    }

    function enviarFormulario() {
  // Obtém os dados do formulário
  const formulario = document.getElementById('enviarFormulario');
  const dadosFormulario = new FormData(formulario); //FormData pega todas as informações do formulario.

  // Envia os dados via AJAX
  const url = formulario.action; // essa parte pega as informações do action e method ja inseridas na abertura do form.
  const metodo = formulario.method;

  fetch(url, {
    method: metodo,
    body: dadosFormulario // o objeto de form data é passado para esse parametro.
  })
  .then(response => {
    // Lida com a resposta do servidor
    if (response.ok) {
      // O envio foi bem-sucedido
      console.log('Formulário enviado com sucesso!');
      // Realize aqui as ações necessárias após o envio bem-sucedido do formulário
    } else {
      // O envio falhou
      console.error('Falha ao enviar o formulário.');
    }
  })
  .catch(error => {
    // Lida com erros de requisição
    console.error('Erro na requisição AJAX:', error);
  });
}

</script>