<?php

namespace App\Http\Controllers;
use App\Models\Servico;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class OrdemServico extends Controller
{
    public function cadastrarOrdemDeServico(Request $request)
    {
        $OrdemServico = new Servico;
        $OrdemServico->solicitante = $request->input('solicitante');
        $OrdemServico->responsavel_servico = $request->input('responsavel');
        $OrdemServico->defeito = $request->input('defeito');
        $OrdemServico->observacao = $request->input('observacao');
        $OrdemServico->marca = $request->input('marca');
        $OrdemServico->modelo = $request->input('modelo');
        $OrdemServico->hora_ini = $request->input('hinicio');
        $OrdemServico->hora_fim = $request->input('hfim');
        $OrdemServico->Atividade = $request->input('atividade');
        $OrdemServico->tecnico = $request->input('tecnico');
        $OrdemServico->data = $request->input('data'); 
        $OrdemServico->descricao = $request->input('pdescricao');
        $OrdemServico->pecas = $request->input('peca');
        $OrdemServico->valor_unitario = $request->input('punidade');
        $OrdemServico->quantidade = $request->input('pquantidade');
        $OrdemServico->valortotal = $request->input('vtotal');
        $OrdemServico->save();
    
        return view('sucesso');
    }

    public function atualizarServico(Request $request)
{
    $id = $request->input('id');
    $OrdemServico = Servico::find($id);

    if (!$OrdemServico) {
        // O serviço não foi encontrado, faça algo, como redirecionar ou exibir uma mensagem de erro
    }

    // Atualize os campos do serviço com os dados do formulário
        $OrdemServico->solicitante = $request->input('solicitante');
        $OrdemServico->responsavel_servico = $request->input('responsavel');
        $OrdemServico->defeito = $request->input('defeito');
        $OrdemServico->observacao = $request->input('observacao');
        $OrdemServico->marca = $request->input('marca');
        $OrdemServico->modelo = $request->input('modelo');
        $OrdemServico->hora_ini = $request->input('hinicio');
        $OrdemServico->hora_fim = $request->input('hfim');
        $OrdemServico->Atividade = $request->input('atividade');
        $OrdemServico->tecnico = $request->input('tecnico');
        $OrdemServico->data = $request->input('data'); 
        $OrdemServico->descricao = $request->input('pdescricao');
        $OrdemServico->pecas = $request->input('peca');
        $OrdemServico->valor_unitario = $request->input('punidade');
        $OrdemServico->quantidade = $request->input('pquantidade');
        $OrdemServico->valortotal = $request->input('vtotal');
        $OrdemServico->save();
    // Atualize outros campos conforme necessário

    // Salve as alterações no banco de dados
    $OrdemServico->save();
    
    // Redirecione para uma página de sucesso ou faça algo mais, conforme necessário
    return redirect()->route('layoutServ');
}

}



