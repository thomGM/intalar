<?php

namespace App\Http\Controllers;
use App\Models\Servico;
use App\Models\Equipamento;
use App\Models\pecas;
use App\Models\serv;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


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

        $equipamento = new Equipamento;
        $equipamento->id_servico = $servicoId;
        $equipamento->equipamento = $request->input('equipamento');
        $equipamento->defeito = $request->input('defeito');
        $equipamento->observacao = $request->input('observacao');
        $equipamento->marca = $request->input('marca');
        $equipamento->modelo = $request->input('modelo');
        $equipamento->save();

        $serv = new serv;
        $serv->id_servico = $servicoId;
        $serv->hora_ini = $request->input('hinicio');
        $serv->hora_fim = $request->input('hfim');
        $serv->Atividade = $request->input('atividade');
        $serv->tecnico = $request->input('tecnico');
        $serv->save(); 

        $peca = new pecas;
        $peca->id_servico = $servicoId;
        $peca->descricao = $request->input('pdescricao');
        $peca->valor_unitario = $request->input('punidade');
        $peca->quantidade = $request->input('pquantidade');
        $peca->save();
    
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
                   ->first(['Servico.*', 'eq.*', 's.*', 'p.*']);


    if (!$OrdemServico) {
        // O serviço não foi encontrado, faça algo, como redirecionar ou exibir uma mensagem de erro
    }

    // Atualize os campos do serviço com os dados do formulário
       // Atualize os campos do serviço
    DB::table('ordem_servico')
    ->where('id', $id)
    ->update([
        'solicitante' => $request->input('solicitante'),
        'responsavel_servico' => $request->input('responsavel'),
        'data' => $request->input('data'),
        'vtotal' => $request->input('vtotal')
    ]);

        // Atualize os campos do equipamento
        DB::table('equipamento')
            ->where('id_servico', $id)
            ->update([
                'equipamento' => $request->input('equipamento'),
                'defeito' => $request->input('defeito'),
                'observacao' => $request->input('observacao'),
                'marca' => $request->input('marca'),
                'modelo' => $request->input('modelo')
            ]);

        // Atualize os campos do serviço
        DB::table('servicos')
            ->where('id_servico', $id)
            ->update([
                'hora_ini' => $request->input('hinicio'),
                'hora_fim' => $request->input('hfim'),
                'Atividade' => $request->input('atividade'),
                'tecnico' => $request->input('tecnico')
            ]);

        // Atualize os campos da peça
        DB::table('pecas')
            ->where('id_servico', $id)
            ->update([
                'descricao' => $request->input('pdescricao'),
                'valor_unitario' => $request->input('punidade'),
                'quantidade' => $request->input('pquantidade')
            ]);

            return redirect()->route('layoutServ');
     }


}



