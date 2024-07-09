<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceitasController extends AppController
{
    public function resumo(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.resumo', ['periodo' => $periodo]);
    }

    public function total(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.total', ['periodo' => $periodo]);
    }

    public function correntes(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.correntes', ['periodo' => $periodo]);
    }

    public function propria(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.propria', ['periodo' => $periodo]);
    }

    public function transfcorrentes(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.transfcorrentes', ['periodo' => $periodo]);
    }

    public function transfcorrentesbr(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.transfcorrentesbr', ['periodo' => $periodo]);
    }

    public function transfcorrentesrs(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.transfcorrentesrs', ['periodo' => $periodo]);
    }

    public function transfcorrentessaude(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.transfcorrentessaude', ['periodo' => $periodo]);
    }

    public function transfcorrenteseducacao(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.transfcorrenteseducacao', ['periodo' => $periodo]);
    }

    public function transfcorrentesassistencia(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.transfcorrentesassistencia', ['periodo' => $periodo]);
    }

    public function fpm(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.fpm', ['periodo' => $periodo]);
    }

    public function icms(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.icms', ['periodo' => $periodo]);
    }

    public function fundeb(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('receitas.fundeb', ['periodo' => $periodo]);
    }
}
