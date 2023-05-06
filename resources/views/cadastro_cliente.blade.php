<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="/cadastrar-cliente">
                @csrf

                    Nome: <input type="text" name="nomecliente" required/></br>
                    CPF/CNPJ: <input type="number" name="idcliente"required/></br>
                    Aniversário: <input type="date" name="aniversario" required/></br>
                    Celular: <input type="number" name="numerocliente"required/></br>
                    E-mail: <input type="text" name="emailcliente"required/></br></br>
                    <h2>Endereço</h2> 
                    CEP: <input type="number" name="cepcliente"required/></br>
                    Rua: <input type="text" name="ruacliente"required/></br>
                    Número: <input type="number" name="numenderecocliente"required/></br>
                    Bairro: <input type="text" name="bairrocliente"required/></br>
                    Cidade: <input type="text" name="cidadecliente"required/></br>
                    <button type="submit">Cadastrar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>