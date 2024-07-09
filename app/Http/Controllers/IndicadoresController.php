<?php

namespace App\Http\Controllers;

use App\Http\Resources\Indices\MdeResource;
use App\Models\Mde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicadoresController extends AppController
{
    public function resumo(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indicadores.resumo', ['periodo' => $periodo]);
    }

    public function folha(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indicadores.dotacao.folha', ['periodo' => $periodo]);
    }

    public function vale(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indicadores.dotacao.vale', ['periodo' => $periodo]);
    }

    public function disponibilidade(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indicadores.disponibilidade', ['periodo' => $periodo]);
    }
}
