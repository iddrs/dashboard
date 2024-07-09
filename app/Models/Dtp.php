<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtp extends Model
{
    use HasFactory;

    protected $table = 'dtp';

    protected $fillable = [
        'data_base',
        'rcl',
        'dtp',
        'perc_apurado',
        'perc_limite_alerta',
        'vl_limite_alerta',
        'perc_limite_prudencial',
        'vl_limite_prudencial',
        'perc_limite_legal',
        'vl_limite_legal',
        'fonte',
    ];
}
