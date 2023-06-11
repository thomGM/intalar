<?php 
use App\Models\Servico;
$servico = Servico::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF From View</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td, table th {
            border: 1px solid black;
        }
        .linha-destaque {
            background-color: #808080;
        }
</style>
</head>
<body>
    <table style="width: 100%;">
        <tr>
            <th style="width: 20%;" rowspan="2"></th>
            <th colspan="2">{{ $title }}</th>
            <th rowspan="2" style="width: 10%;">Nº: 123</th>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;" class="linha-destaque">ORDEM DE SERIÇO</td>
        </tr>
        <tr>
            <td>Data: 01/01/2023</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>Solicitante: </td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>Responsável pelo Serviço: </td>
            <td colspan="3"></td>
        </tr>
    </table>
    <table> 
        <tr>
            <th colspan="4" class="linha-destaque">Equipamento</th>
        </tr>
        <tr>
            <th style="width: 25px;">Equipamento</th>
            <th>Local</th>
            <th>Marca</th>
            <th>Modelo</th>
        </tr>
        <tr>
            <td>*</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 30px;">Defeito/Problema: </td>
            <td></td>
        </tr>
        <tr>
            <td>Observações: </td>
            <td></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <th colspan="5" class="linha-destaque">Serviço</th>
        </tr>
        <tr>
            <td style="width: 10%;">Hora Início</td>
            <td style="width: 10%;">Hora Término</td>
            <td style="text-align:center;">Atividade</td>
            <td style="width: 20%; text-align:center;">Técnico</td>
            <td style="width: 20%; text-align:center;">Tempo Total</td>
        </tr>
        <tr>
            <td>*</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <th colspan="4" class="linha-destaque">Peças</th>
        </tr>
        <tr>
            <td style="width: 50%;">Descrição</td>
            <td style="width: 15%;">Preço Unitário</td>
            <td style="width: 15%; text-align:center;">Quant.</td>
            <td stule="text-align:center;">Valor</td>
        </tr>
        <tr>
            <td>*</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    </br>
    </br>

    <label>Data do fechamento da OS: _____/_____/_____ </label>
    </br>
    </br>
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Confirmo a realização dos Serviços descritos e o uso</br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    das peças relacionadas.</label>
    </br>
    </br>
    <label>___________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________</label>
    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Técnico&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Encarregado Manutenção </label>   
     
</body>
</html>