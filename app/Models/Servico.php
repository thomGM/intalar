<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'ordem_servico';
    protected $fillable = [
        'id',
        'solicitante',
        'responsavel_servico',
        'vtotal'
    ];
}
