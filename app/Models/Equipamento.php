<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'equipamento';
    protected $fillable = [
        'id_servico',
        'equipamento',
        'marca',
        'modelo',
        'observacao',
        'local'
    ];
}
