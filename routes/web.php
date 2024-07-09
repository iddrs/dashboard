<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\IndicadoresController;
use App\Http\Controllers\IndicesController;
use App\Http\Controllers\ReceitasController;
use App\Http\Resources\Despesas\DespesaCorrenteCollection;
use App\Http\Resources\Despesas\DespesaCorrenteResource;
use App\Http\Resources\Despesas\DespesaPessoalCollection;
use App\Http\Resources\Despesas\DespesaPessoalResource;
use App\Http\Resources\Indices\AspsCollection;
use App\Http\Resources\Indices\AspsResource;
use App\Http\Resources\Indices\DtpCollection;
use App\Http\Resources\Indices\DtpResource;
use App\Http\Resources\Indices\Fundeb70Collection;
use App\Http\Resources\Indices\Fundeb70Resource;
use App\Http\Resources\Indices\MdeCollection;
use App\Http\Resources\Indices\MdeResource;
use App\Http\Resources\Receitas\ArrecadacaoPropriaCollection;
use App\Http\Resources\Receitas\ArrecadacaoPropriaResource;
use App\Http\Resources\Despesas\DespesaTotalCollection;
use App\Http\Resources\Despesas\DespesaTotalResource;
use App\Http\Resources\Indicadores\DisponibilidadeCollection;
use App\Http\Resources\Indicadores\DisponibilidadeResource;
use App\Http\Resources\Indicadores\DotacaoFolhaCollection;
use App\Http\Resources\Indicadores\DotacaoFolhaResource;
use App\Http\Resources\Indicadores\DotacaoValeCollection;
use App\Http\Resources\Indicadores\DotacaoValeResource;
use App\Http\Resources\Receitas\FpmCollection;
use App\Http\Resources\Receitas\FpmResource;
use App\Http\Resources\Receitas\FundebCollection;
use App\Http\Resources\Receitas\FundebResource;
use App\Http\Resources\Receitas\IcmsCollection;
use App\Http\Resources\Receitas\IcmsResource;
use App\Http\Resources\Receitas\ReceitaCorrenteCollection;
use App\Http\Resources\Receitas\ReceitaCorrenteResource;
use App\Http\Resources\Receitas\ReceitaTotalCollection;
use App\Http\Resources\Receitas\ReceitaTotalResource;
use App\Http\Resources\Receitas\TransferenciasCorrentesAssistenciaCollection;
use App\Http\Resources\Receitas\TransferenciasCorrentesAssistenciaResource;
use App\Http\Resources\Receitas\TransferenciasCorrentesBrCollection;
use App\Http\Resources\Receitas\TransferenciasCorrentesBrResource;
use App\Http\Resources\Receitas\TransferenciasCorrentesRsResource;
use App\Http\Resources\Receitas\TransferenciasCorrentesRsCollection;
use App\Http\Resources\Receitas\TransferenciasCorrentesCollection;
use App\Http\Resources\Receitas\TransferenciasCorrentesEducacaoCollection;
use App\Http\Resources\Receitas\TransferenciasCorrentesEducacaoResource;
use App\Http\Resources\Receitas\TransferenciasCorrentesResource;
use App\Http\Resources\Receitas\TransferenciasCorrentesSaudeCollection;
use App\Http\Resources\Receitas\TransferenciasCorrentesSaudeResource;
use App\Models\ArrecadacaoPropria;
use App\Models\Asps;
use App\Models\DespesaCorrente;
use App\Models\DespesaPessoal;
use App\Models\DespesaTotal;
use App\Models\Disponibilidade;
use App\Models\DotacaoFolha;
use App\Models\DotacaoVale;
use App\Models\Dtp;
use App\Models\Fpm;
use App\Models\Fundeb;
use App\Models\Fundeb70;
use App\Models\Icms;
use App\Models\Mde;
use App\Models\ReceitaCorrente;
use App\Models\ReceitaTotal;
use App\Models\TransferenciasCorrentes;
use App\Models\TransferenciasCorrentesAssistencia;
use App\Models\TransferenciasCorrentesBr;
use App\Models\TransferenciasCorrentesEducacao;
use App\Models\TransferenciasCorrentesRs;
use App\Models\TransferenciasCorrentesSaude;
use Illuminate\Support\Facades\Route;

Route::get('/{periodo?}',[AppController::class, 'index'])->name('index');

// índices
Route::get('/indices/resumo/{periodo?}', [IndicesController::class, 'resumo'])->name('indices.resumo');
Route::get('/indices/mde/{periodo?}', [IndicesController::class, 'mde'])->name('indices.mde');
Route::get('/indices/fundeb70/{periodo?}', [IndicesController::class, 'fundeb70'])->name('indices.fundeb70');
Route::get('/indices/asps/{periodo?}', [IndicesController::class, 'asps'])->name('indices.asps');
Route::get('/indices/dtp/{periodo?}', [IndicesController::class, 'dtp'])->name('indices.dtp');

Route::get('/resources/mde/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new MdeResource(Mde::where('data_base', $data_base)->first());
})->name('resources.mde');

Route::get('/resources/collection/mde/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new MdeCollection(Mde::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.mde');

Route::get('/resources/fundeb70/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new Fundeb70Resource(Fundeb70::where('data_base', $data_base)->first());
})->name('resources.fundeb70');

Route::get('/resources/collection/fundeb70/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new Fundeb70Collection(Fundeb70::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.fundeb70');

Route::get('/resources/asps/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new AspsResource(Asps::where('data_base', $data_base)->first());
})->name('resources.asps');

Route::get('/resources/collection/asps/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new AspsCollection(Asps::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.asps');

Route::get('/resources/dtp/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DtpResource(Dtp::where('data_base', $data_base)->first());
})->name('resources.dtp');

Route::get('/resources/collection/dtp/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DtpCollection(Dtp::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.dtp');

// receitas
Route::get('/receitas/resumo/{periodo?}', [ReceitasController::class, 'resumo'])->name('receitas.resumo');
Route::get('/receitas/total/{periodo?}', [ReceitasController::class, 'total'])->name('receitas.total');
Route::get('/receitas/correntes/{periodo?}', [ReceitasController::class, 'correntes'])->name('receitas.correntes');
Route::get('/receitas/propria/{periodo?}', [ReceitasController::class, 'propria'])->name('receitas.propria');
Route::get('/receitas/transfcorrentes/{periodo?}', [ReceitasController::class, 'transfcorrentes'])->name('receitas.transfcorrentes');
Route::get('/receitas/transfcorrentesbr/{periodo?}', [ReceitasController::class, 'transfcorrentesbr'])->name('receitas.transfcorrentesbr');
Route::get('/receitas/transfcorrentesrs/{periodo?}', [ReceitasController::class, 'transfcorrentesrs'])->name('receitas.transfcorrentesrs');
Route::get('/receitas/transfcorrentessaude/{periodo?}', [ReceitasController::class, 'transfcorrentessaude'])->name('receitas.transfcorrentessaude');
Route::get('/receitas/transfcorrenteseducacao/{periodo?}', [ReceitasController::class, 'transfcorrenteseducacao'])->name('receitas.transfcorrenteseducacao');
Route::get('/receitas/transfcorrentesassistencia/{periodo?}', [ReceitasController::class, 'transfcorrentesassistencia'])->name('receitas.transfcorrentesassistencia');
Route::get('/receitas/fpm/{periodo?}', [ReceitasController::class, 'fpm'])->name('receitas.fpm');
Route::get('/receitas/icms/{periodo?}', [ReceitasController::class, 'icms'])->name('receitas.icms');
Route::get('/receitas/fundeb/{periodo?}', [ReceitasController::class, 'fundeb'])->name('receitas.fundeb');






Route::get('/resources/receitas/total/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new ReceitaTotalResource(ReceitaTotal::where('data_base', $data_base)->first());
})->name('resources.receitas.total');
Route::get('/resources/receitas/correntes/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new ReceitaCorrenteResource(ReceitaCorrente::where('data_base', $data_base)->first());
})->name('resources.receitas.correntes');
Route::get('/resources/receitas/propria/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new ArrecadacaoPropriaResource(ArrecadacaoPropria::where('data_base', $data_base)->first());
})->name('resources.receitas.propria');
Route::get('/resources/receitas/transfcorrentes/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new TransferenciasCorrentesResource(TransferenciasCorrentes::where('data_base', $data_base)->first());
})->name('resources.receitas.transfcorrentes');
Route::get('/resources/receitas/transfcorrentesbr/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new TransferenciasCorrentesBrResource(TransferenciasCorrentesBr::where('data_base', $data_base)->first());
})->name('resources.receitas.transfcorrentesbr');
Route::get('/resources/receitas/transfcorrentesrs/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new TransferenciasCorrentesRsResource(TransferenciasCorrentesRs::where('data_base', $data_base)->first());
})->name('resources.receitas.transfcorrentesrs');
Route::get('/resources/receitas/transfcorrentessaude/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new TransferenciasCorrentesSaudeResource(TransferenciasCorrentesSaude::where('data_base', $data_base)->first());
})->name('resources.receitas.transfcorrentessaude');
Route::get('/resources/receitas/transfcorrenteseducacao/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new TransferenciasCorrentesEducacaoResource(TransferenciasCorrentesEducacao::where('data_base', $data_base)->first());
})->name('resources.receitas.transfcorrenteseducacao');
Route::get('/resources/receitas/transfcorrentesassistencia/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new TransferenciasCorrentesAssistenciaResource(TransferenciasCorrentesAssistencia::where('data_base', $data_base)->first());
})->name('resources.receitas.transfcorrentesassistencia');
Route::get('/resources/receitas/fpm/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new FpmResource(Fpm::where('data_base', $data_base)->first());
})->name('resources.receitas.fpm');
Route::get('/resources/receitas/icms/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new IcmsResource(Icms::where('data_base', $data_base)->first());
})->name('resources.receitas.icms');
Route::get('/resources/receitas/fundeb/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new FundebResource(Fundeb::where('data_base', $data_base)->first());
})->name('resources.receitas.fundeb');






Route::get('/resources/collection/receitas/total/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new ReceitaTotalCollection(ReceitaTotal::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.total');
Route::get('/resources/collection/receitas/correntes/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new ReceitaCorrenteCollection(ReceitaCorrente::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.correntes');
Route::get('/resources/collection/receitas/propria/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new ArrecadacaoPropriaCollection(ArrecadacaoPropria::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.propria');
Route::get('/resources/collection/receitas/transfcorrentes/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new TransferenciasCorrentesCollection(TransferenciasCorrentes::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.transfcorrentes');
Route::get('/resources/collection/receitas/transfcorrentesbr/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new TransferenciasCorrentesBrCollection(TransferenciasCorrentesBr::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.transfcorrentesbr');
Route::get('/resources/collection/receitas/transfcorrentesrs/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new TransferenciasCorrentesRsCollection(TransferenciasCorrentesRs::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.transfcorrentesrs');
Route::get('/resources/collection/receitas/transfcorrentessaude/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new TransferenciasCorrentesSaudeCollection(TransferenciasCorrentesSaude::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.transfcorrentessaude');
Route::get('/resources/collection/receitas/transfcorrenteseducacao/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new TransferenciasCorrentesEducacaoCollection(TransferenciasCorrentesEducacao::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.transfcorrenteseducacao');
Route::get('/resources/collection/receitas/transfcorrentesassistencia/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new TransferenciasCorrentesAssistenciaCollection(TransferenciasCorrentesAssistencia::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.transfcorrentesassistencia');
Route::get('/resources/collection/receitas/fpm/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new FpmCollection(Fpm::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.fpm');
Route::get('/resources/collection/receitas/icms/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new IcmsCollection(Icms::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.icms');
Route::get('/resources/collection/receitas/fundeb/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new FundebCollection(Fundeb::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.receitas.fundeb');




// despesas
Route::get('/despesas/resumo/{periodo?}', [DespesasController::class, 'resumo'])->name('despesas.resumo');
Route::get('/despesas/total/{periodo?}', [DespesasController::class, 'total'])->name('despesas.total');
Route::get('/despesas/corrente/{periodo?}', [DespesasController::class, 'corrente'])->name('despesas.corrente');
Route::get('/despesas/pessoal/{periodo?}', [DespesasController::class, 'pessoal'])->name('despesas.pessoal');



Route::get('/resources/despesas/total/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DespesaTotalResource(DespesaTotal::where('data_base', $data_base)->first());
})->name('resources.despesas.total');
Route::get('/resources/despesas/corrente/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DespesaCorrenteResource(DespesaCorrente::where('data_base', $data_base)->first());
})->name('resources.despesas.corrente');
Route::get('/resources/despesas/pessoal/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DespesaPessoalResource(DespesaPessoal::where('data_base', $data_base)->first());
})->name('resources.despesas.pessoal');




Route::get('/resources/collection/despesas/total/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DespesaTotalCollection(DespesaTotal::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.despesas.total');
Route::get('/resources/collection/despesas/corrente/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DespesaCorrenteCollection(DespesaCorrente::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.despesas.corrente');
Route::get('/resources/collection/despesas/pessoal/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DespesaPessoalCollection(DespesaPessoal::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.despesas.pessoal');




// indicadores
Route::get('/indices/indicadores/{periodo?}', [IndicadoresController::class, 'resumo'])->name('indicadores.resumo');
Route::get('/indices/indicadores/dotacao/folha/{periodo?}', [IndicadoresController::class, 'folha'])->name('indicadores.dotacao.folha');
Route::get('/indices/indicadores/dotacao/vale/{periodo?}', [IndicadoresController::class, 'vale'])->name('indicadores.dotacao.vale');
Route::get('/indices/indicadores/disponibilidade/{periodo?}', [IndicadoresController::class, 'disponibilidade'])->name('indicadores.disponibilidade');


Route::get('/resources/indicadores/dotacao/folha/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DotacaoFolhaResource(DotacaoFolha::where('data_base', $data_base)->first());
})->name('resources.indicadores.dotacao.folha');
Route::get('/resources/indicadores/dotacao/vale/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DotacaoValeResource(DotacaoVale::where('data_base', $data_base)->first());
})->name('resources.indicadores.dotacao.vale');
Route::get('/resources/indicadores/disponibilidade/{periodo}', function (string $periodo) {
    $data_base = data_base($periodo);
    return new DisponibilidadeResource(Disponibilidade::where('data_base', $data_base)->first());
})->name('resources.indicadores.disponibilidade');


Route::get('/resources/collection/indicadores/dotacao/folha/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DotacaoFolhaCollection(DotacaoFolha::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.indicadores.dotacao.folha');
Route::get('/resources/collection/indicadores/dotacao/vale/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DotacaoValeCollection(DotacaoVale::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.indicadores.dotacao.vale');
Route::get('/resources/collection/indicadores/disponibilidade/{periodo}', function (string $periodo) {
    $data_base2 = data_base($periodo);
    $year = date('Y', strtotime($data_base2));
    $data_base1 = "$year-01-01";
    return new DisponibilidadeCollection(Disponibilidade::whereBetween('data_base', [$data_base1, $data_base2])->get());
})->name('resources.collection.indicadores.disponibilidade');
