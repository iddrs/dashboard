<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespesasController extends AppController
{
    public function resumo(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('despesas.resumo', ['periodo' => $periodo]);
    }

    public function total(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('despesas.total', ['periodo' => $periodo]);
    }

    public function corrente(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('despesas.corrente', ['periodo' => $periodo]);
    }

    public function pessoal(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('despesas.pessoal', ['periodo' => $periodo]);
    }
}
