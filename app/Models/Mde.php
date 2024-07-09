<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mde extends Model
{
    use HasFactory;

    protected $table = 'mde';

    protected $fillable = ['data_base', 'receita_bc', 'despesa_bc', 'perc_minimo', 'perc_apurado', 'vl_minimo', 'vl_diferenca', 'fonte'];
}
