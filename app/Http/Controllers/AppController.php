<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function lastPeriodo(): string
    {
        return (date_create_from_format('Y-m-d', DB::table('mde')->orWhereNotNull('receita_bc')->orderByDesc('data_base')->first()->data_base))->format('Y-m');
    }

    public function index(Request $request, ?string $periodo = null)
    {
        $periodo = $request->get('periodo', $periodo ?? $this->lastPeriodo());
        return view('welcome', ['periodo' => $periodo]);
    }
}
