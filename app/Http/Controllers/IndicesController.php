<?php

namespace App\Http\Controllers;

use App\Http\Resources\Indices\MdeResource;
use App\Models\Mde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicesController extends AppController
{
    public function resumo(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indices.resumo', ['periodo' => $periodo]);
    }

    public function mde(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indices.mde', ['periodo' => $periodo]);
    }

    public function fundeb70(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indices.fundeb70', ['periodo' => $periodo]);
    }

    public function asps(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indices.asps', ['periodo' => $periodo]);
    }

    public function dtp(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('indices.dtp', ['periodo' => $periodo]);
    }
}
