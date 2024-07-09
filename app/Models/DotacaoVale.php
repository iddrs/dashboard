<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotacaoVale extends Model
{
    use HasFactory;

    protected $table = 'dotacao_vale';

    protected $fillable = [
        'data_base',
        'dotacao_atualizada',
        'dotacao_necessaria',
        'resultado',
    ];
}
