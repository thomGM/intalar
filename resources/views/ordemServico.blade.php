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

                    Solicitante: <input type="text" name="solicitante" required/></br>
                    Responsável pelo serviço: <input type="text" name="responsavel"required/></br>
                    Defeito: <input type="text" name="defeito" required/></br>
                    Observação: <input type="text" name="observacao"required/></br>
                    Marca: <input type="text" name="marca"required/></br>
                    Modelo: <input type="text" name="modelo" required/></br></br>
                    <h2>Serviços</h2> 
                    Hora Inicio: <input type="time" name="hinicio"required/></br>
                    Hora Fim: <input type="time" name="hfim"required/></br>
                    Atividade: <input type="text" name="atividade"required/></br>
                    Técnico: <input type="text" name="tecnico"required/></br>
                    Tempo Total: <input type="time" name="tempototal"required/></br></br>
                    <h2>Peças</h2>
                    Descrição: <input type="text" name="pdescricao"required/></br>
                    Tipo: <input type="text" name="peca"required/></br>
                    Preço Unitário: <input type="text" name="punidade"required/></br>
                    Quantidade: <input type="number" name="pquantidade"required/></br>
                    Valor: <input type="text" name="vtotal"required/></br>

                    <button type="submit">Enviar</button> 
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>