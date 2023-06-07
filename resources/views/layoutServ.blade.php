<?php
use App\Models\Servico;
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
                <table>
                    <tr>
                        <th>Numero</th>
                        <th>Solicitante</th>
                        <th>Atividade</th>
                        <th>Data</th>
                        <th>Técnico</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
                    <?php 
                        foreach (Servico::all() as $servico) {
                            echo "<tr>";
                            echo '<td><a href="' . route('servUp', ['id' => $servico->id]) . '">' . $servico->id . '</a></td>';
                            echo "<td>" . $servico->solicitante . "</td>";
                            echo "<td>" . $servico->Atividade . "</td>";
                            echo "<td>" . $servico->data . "</td>";
                            echo "<td>" . $servico->tecnico . "</td>";
                            echo "<td>" . $servico->valortotal . "</td>";
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