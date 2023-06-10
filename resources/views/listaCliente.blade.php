<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<?php
use App\Models\Cliente;
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
                @csrf
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Numero</th>
                        <th>Nome</th>
                        <th>CPF/CNPJ</th>
                        <th>Numero</th>
                        <th>E-mail</th>
                    </tr>
                    <tr>
                    <?php 
                        foreach (Cliente::all() as $cliente) {
                            echo "<tr>";
                            echo '<td><a href="' . route('clienteUp', ['id' => $cliente->id]) . '">' . $cliente->id . '</a></td>';
                            echo "<td>" . $cliente->nome . "</td>";
                            echo "<td>" . $cliente->cpf_cnpj . "</td>";
                            echo "<td>" . $cliente->numero . "</td>";
                            echo "<td>" . $cliente->email . "</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>