<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferenciasCorrentesAssistencia extends Model
{
    use HasFactory;

    protected $table = 'transferencias_correntes_assistencia';

    protected $fillable = [
        'data_base',
        'arrecadado_anterior_mes',
        'previsto_loa_mes',
        'arrecadado_mes',
        'exercicio',
        'arrecadado_anterior_acum',
        'previsto_loa_acum',
        'arrecadado_acum',
        'dif_mes_arrec_ant_vl',
        'dif_mes_arrec_prev_vl',
        'dif_mes_arrec_ant_perc',
        'dif_mes_arrec_prev_perc',
        'dif_acum_arrec_ant_vl',
        'dif_acum_arrec_prev_vl',
        'dif_acum_arrec_ant_perc',
        'dif_acum_arrec_prev_perc',
    ];
}
