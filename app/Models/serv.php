<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serv extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'servicos';
    protected $fillable = [
        'id_servico',
        'defeito',
        'observacao',
        'marca',
        'modelo',
        'local'
    ];
}
