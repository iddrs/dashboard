<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespesaCorrente extends Model
{
    use HasFactory;

    protected $table = 'despesa_corrente';

    protected $fillable = [
        'data_base',
        'emp_anterior_mes',
        'receita_corrente_mes',
        'emp_mes',
        'exercicio',
        'emp_ant_acum',
        'receita_corrente_acum',
        'emp_acum',
        'dif_emp_ant_mes_vl',
        'dif_emp_ant_mes_perc',
        'dif_emp_receita_mes_vl',
        'dif_emp_receita_mes_perc',
        'dif_emp_ant_acum_vl',
        'dif_emp_ant_acum_perc',
        'dif_emp_receita_acum_vl',
        'dif_emp_receita_acum_perc',
    ];
}
