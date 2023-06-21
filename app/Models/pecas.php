<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pecas extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'pecas';
    protected $fillable = [
        'id_servico',
        'pecas',
        'valor_unitario',
        'quantidade'
    ];
}
