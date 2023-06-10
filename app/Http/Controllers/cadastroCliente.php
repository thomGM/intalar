<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class cadastroCliente extends Controller
{
    public function cadastrarCliente(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nome = $request->input('nomecliente');
        $cliente->cpf_cnpj = $request->input('idcliente');
        $cliente->aniversario = $request->input('aniversario');
        $cliente->celular = $request->input('numerocliente');
        $cliente->email = $request->input('emailcliente');
        $cliente->cep = $request->input('cepcliente');
        $cliente->rua = $request->input('ruacliente');
        $cliente->numero = $request->input('numenderecocliente');
        $cliente->bairro = $request->input('bairrocliente');
        $cliente->cidade = $request->input('cidadecliente');
        $cliente->save();
    
        return redirect()->route('listaCliente');
    }

    public function atualizarCliente(Request $request)
    {
        $id = $request->input('id');
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            // O serviço não foi encontrado, faça algo, como redirecionar ou exibir uma mensagem de erro
        }
    
        // Atualize os campos do serviço com os dados do formulário
        $cliente->nome = $request->input('nomecliente');
        $cliente->cpf_cnpj = $request->input('idcliente');
        $cliente->aniversario = $request->input('aniversario');
        $cliente->celular = $request->input('numerocliente');
        $cliente->email = $request->input('emailcliente');
        $cliente->cep = $request->input('cepcliente');
        $cliente->rua = $request->input('ruacliente');
        $cliente->numero = $request->input('numenderecocliente');
        $cliente->bairro = $request->input('bairrocliente');
        $cliente->cidade = $request->input('cidadecliente');
        $cliente->save();
        // Atualize outros campos conforme necessário
    
        // Salve as alterações no banco de dados
        $cliente->save();
        
        // Redirecione para uma página de sucesso ou faça algo mais, conforme necessário
        return redirect()->route('listaCliente');
    }
    
}
