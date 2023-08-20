<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nu_prioridade',
        'st_demanda',
        'st_modulo',
        'st_status',
        'st_tipo',
        'bo_prioridade',
        'st_descricao',
        'dt_inicio',
        'dt_conclusao',
        'dt_cadastro',
    ];
}
