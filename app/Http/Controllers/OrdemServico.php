<?php

namespace App\Http\Controllers;
use App\Models\Servico;
use App\Models\Equipamento;
use App\Models\pecas;
use App\Models\serv;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



use Illuminate\Http\Request;

class OrdemServico extends Controller
{
    public function cadastrarOrdemDeServico(Request $request)
    {


        $OrdemServico = new Servico;
        $OrdemServico->solicitante = $request->input('solicitante');
        $OrdemServico->responsavel_servico = $request->input('responsavel');
        $OrdemServico->data = $request->input('data');
        $OrdemServico->vtotal = $request->input('vtotal');
        $OrdemServico->save();

        $servicoId = $OrdemServico->id;

        $equipamento = $request->input('equipamento');
        $defeito = $request->input('defeito');
        $observacao = $request->input('observacao');
        $marca = $request->input('marca');
        $modelo = $request->input('modelo');

        foreach ($equipamento as $indexequip => $equip) {
            $novoEquipamento = new Equipamento;
            $novoEquipamento->id_servico = $servicoId;
            $novoEquipamento->equipamento = $equip;
            $novoEquipamento->defeito = $defeito[$indexequip];
            $novoEquipamento->observacao = $observacao[$indexequip];
            $novoEquipamento->marca = $marca[$indexequip];
            $novoEquipamento->modelo = $modelo[$indexequip];
            $novoEquipamento->save();
        }

        $hinicio = $request->input('hinicio');
        $hfim = $request->input('hfim');
        $atividade = $request->input('atividade');
        $tecnico = $request->input('tecnico');

        foreach ($atividade as $indexserv => $descricaoAtividade) {
            $novoServico = new Serv;
            $novoServico->id_servico = $servicoId;
            $novoServico->hora_ini = $hinicio[$indexserv];
            $novoServico->hora_fim = $hfim[$indexserv];
            $novoServico->atividade = $descricaoAtividade;
            $novoServico->tecnico = $tecnico[$indexserv];
            $novoServico->save(); 
        }

        $pecas = $request->input('pdescricao');
        $precos = $request->input('punidade');
        $quantidades = $request->input('pquantidade');

        // Salva as peças no banco de dados
        foreach ($pecas as $index => $descricao) {
            $novapeca = new Pecas;
            $novapeca->descricao = $descricao;
            $novapeca->valor_unitario = $precos[$index];
            $novapeca->quantidade = $quantidades[$index];
            $novapeca->id_servico = $servicoId; // Associa a peça à ordem de serviço
            $novapeca->save();
        }
    
        return redirect()->route('layoutServ');
    }

    public function atualizarServico(Request $request)
{
    $id = $request->input('id');

    $OrdemServico = DB::table('ordem_servico as Servico')
                   ->leftJoin('equipamento as eq', 'Servico.id', '=', 'eq.id_servico')
                   ->leftJoin('servicos as s', 'Servico.id', '=', 's.id_servico')
                   ->leftJoin('pecas as p', 'Servico.id', '=', 'p.id_servico')
                   ->where('Servico.id', '=', $id)
                   ->get(['Servico.*', 'eq.*', 's.*', 'p.*']);


    if (!$OrdemServico) {
        // O serviço não foi encontrado, faça algo, como redirecionar ou exibir uma mensagem de erro
    }

        $OrdemServico = Servico::find($id); // Obter o objeto existente pelo ID

        // Atualizar os campos da Ordem de Serviço
        $OrdemServico->solicitante = $request->input('solicitante');
        $OrdemServico->responsavel_servico = $request->input('responsavel');
        $OrdemServico->data = $request->input('data');
        $OrdemServico->vtotal = $request->input('vtotal');
        $OrdemServico->save();

       
        $id_equipamento = $request->input('id_equipamento');
        $equipamento = $request->input('equipamento');
        $defeito = $request->input('defeito');
        $observacao = $request->input('observacao');
        $marca = $request->input('marca');
        $modelo = $request->input('modelo'); 
    

    foreach ($id_equipamento as $indexequip => $equip) {
        
    // Obter o equipamento existente pelo índice e ID do serviço
    $novoEquipamento = Equipamento::where('id_servico', $id)->where('id', $equip)->first();
    
    // Verificar se o equipamento existe
    if ($novoEquipamento) {
        // Atualizar os campos do equipamento
        $novoEquipamento->equipamento = $equipamento[$indexequip];
        $novoEquipamento->defeito = $defeito[$indexequip];
        $novoEquipamento->observacao = $observacao[$indexequip];
        $novoEquipamento->marca = $marca[$indexequip];
        $novoEquipamento->modelo = $modelo[$indexequip];
        $novoEquipamento->save();
    } else {
        // O equipamento não existe, você pode tratá-lo como uma nova inserção se necessário
        $novoEquipamento = new Equipamento();
        $novoEquipamento->id_servico = $id;
        $novoEquipamento->equipamento = $equipamento[$indexequip];
        $novoEquipamento->defeito = $defeito[$indexequip];
        $novoEquipamento->observacao = $observacao[$indexequip];
        $novoEquipamento->marca = $marca[$indexequip];
        $novoEquipamento->modelo = $modelo[$indexequip];
        $novoEquipamento->save();
    }
}

    $id_servico = $request->input('id_servico');
    $hinicio = $request->input('hinicio');
    $hfim = $request->input('hfim');
    $atividade = $request->input('atividade');
    $tecnico = $request->input('tecnico');

// Atualizar os serviços
foreach ($id_servico as $indexserv => $servico) {

    // Obter o serviço existente pelo índice e ID do serviço
    $novoServico = Serv::where('id_servico', $id)->where('id', $servico)->first();
    
    // Verificar se o serviço existe
    if ($novoServico) {
        // Atualizar os campos do serviço
        $novoServico->hora_ini = $hinicio[$indexserv];
        $novoServico->hora_fim = $hfim[$indexserv];
        $novoServico->atividade = $atividade[$indexserv];
        $novoServico->tecnico = $tecnico[$indexserv];
        $novoServico->save();
    } else {
        // O serviço não existe, você pode tratá-lo como uma nova inserção se necessário
        $novoServico = new Serv();
        $novoServico->id_servico = $id;
        $novoServico->hora_ini = $hinicio[$indexserv];
        $novoServico->hora_fim = $hfim[$indexserv];
        $novoServico->atividade = $atividade[$indexserv];
        $novoServico->tecnico = $tecnico[$indexserv];
        $novoServico->save();
    }
}
    $id_pecas = $request->input('id_pecas');
    $pecas = $request->input('pdescricao');
    $precos = $request->input('punidade');
    $quantidades = $request->input('pquantidade');

// Atualizar as peças
foreach ($id_pecas as $indexpeca => $peca) {

    // Obter a peça existente pelo índice e ID do serviço
    $novaPeca = Pecas::where('id_servico', $id)->where('id', $peca)->first();
    
    // Verificar se a peça existe
    if ($novaPeca) {
        // Atualizar os campos da peça
        $novaPeca->descricao = $pecas[$indexpeca];
        $novaPeca->quantidade = $quantidades[$indexpeca];
        $novaPeca->valor_unitario = $precos[$indexpeca];
        $novaPeca->save();
    } else {
        // A peça não existe, você pode tratá-la como uma nova inserção se necessário
        $novaPeca = new Pecas();
        $novaPeca->id_servico = $id;
        $novaPeca->descricao = $pecas[$indexpeca];
        $novaPeca->quantidade = $quantidades[$indexpeca];
        $novaPeca->valor_unitario = $precos[$indexpeca];
        $novaPeca->save();
    }
}
            return redirect()->route('layoutServ');
     }


}





