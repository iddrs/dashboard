<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidade extends Model
{
    use HasFactory;

    protected $table = 'disponibilidade';

    protected $fillable = [
        'data_base',
        'saldo_financeiro',
        'restos_pagar',
        'empenhado_pagar',
        'duodecimo_repassar',
        'outras_obrigacoes',
        'disponivel_bruto',
        'reservas',
        'disponivel_liquido',
    ];
}
