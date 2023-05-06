<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'aniversario',
        'celular',
        'email',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
    ];
}
