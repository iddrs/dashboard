<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotacaoFolha extends Model
{
    use HasFactory;

    protected $table = 'dotacao_folha';

    protected $fillable = [
        'data_base',
        'dotacao_atualizada',
        'dotacao_necessaria',
        'resultado',
    ];
}
