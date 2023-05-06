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
    
        return view('sucesso');
    }
}
