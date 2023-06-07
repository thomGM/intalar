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

}
