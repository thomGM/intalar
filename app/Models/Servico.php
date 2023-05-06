<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'ordem_servico';
    protected $fillable = [
        'solicitante',
        'responsavel_servico',
        'defeito',
        'observacao',
        'marca',
        'modelo',
        'hora_ini',
        'hora_fim',
        'Atividade',
        'tecnico',
        'descricao',
        'pecas',
        'valor_unitario',
        'quantidade',
        'valortotal'
    ];
}
