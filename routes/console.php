<?php

use App\Models\ArrecadacaoPropria;
use App\Models\Asps;
use App\Models\DespesaCorrente;
use App\Models\DespesaPessoal;
use App\Models\DespesaTotal;
use App\Models\Disponibilidade;
use App\Models\DotacaoFolha;
use App\Models\DotacaoVale;
use App\Models\Dtp;
use App\Models\Fundeb70;
use App\Models\Mde;
use App\Models\ReceitaCorrente;
use App\Models\ReceitaTotal;
use App\Models\TransferenciasCorrentes;
use App\Models\TransferenciasCorrentesAssistencia;
use App\Models\TransferenciasCorrentesBr;
use App\Models\TransferenciasCorrentesEducacao;
use App\Models\TransferenciasCorrentesRs;
use App\Models\TransferenciasCorrentesSaude;
use App\Models\Fpm;
use App\Models\Fundeb;
use App\Models\Icms;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Settings;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('import', function () {
    $excelTables = [
        'exec.lrf.dtp' => Dtp::class,
        'asps.pad' => Asps::class,
        'mde.pad' => Mde::class,
        'fundeb70.pad' => Fundeb70::class,
        'pm.receita.total' => ReceitaTotal::class,
        'pm.receita.corrente' => ReceitaCorrente::class,
        'pm.receita.arrec.propria' => ArrecadacaoPropria::class,
        'pm.receita.transf.corrente' => TransferenciasCorrentes::class,
        'pm.receita.transf.corr.br' => TransferenciasCorrentesBr::class,
        'pm.receita.transf.corr.rs' => TransferenciasCorrentesRs::class,
        'pm.receita.transf.corr.saude' => TransferenciasCorrentesSaude::class,
        'pm.receita.transf.corr.educacao' => TransferenciasCorrentesEducacao::class,
        'pm.receita.transf.corr.ass.soc' => TransferenciasCorrentesAssistencia::class,
        'pm.receita.fpm' => Fpm::class,
        'pm.receita.icms' => Icms::class,
        'pm.receita.fundeb' => Fundeb::class,
        'pm.despesa.total' => DespesaTotal::class,
        'pm.despesa.corrente' => DespesaCorrente::class,
        'pm.despesa.pessoal' => DespesaPessoal::class,
        'pm.dotacao.folha' => DotacaoFolha::class,
        'pm.dotacao.vale' => DotacaoVale::class,
        'pm.disponibilidades.livre' => Disponibilidade::class,
    ];
    foreach ($excelTables as $tableName => $modelName) {

        Settings::setLocale('pt_br');
        $reader = new Xlsx();
        $spreadsheet = $reader->load(env('EXCEL_KPI_FILE_PATH'));
        $table = $spreadsheet->getTableByName($tableName);
        $xdata = $table->getWorksheet()->rangeToArray($table->getRange());
        $colNames = array_map(fn ($value) => str_replace('.', '_', $value), array_shift($xdata));
        $data = [];
        foreach ($xdata as $i => $row) {
            if (is_null($row[0])) continue;
            foreach ($row as $j => $v) {
                if (is_null($v)) continue;
                $v = str_replace(',', '', $v);
                $v = str_replace('(', '-', $v);
                $v = str_replace(')', '', $v);
                if ($colNames[$j] === 'data_base') {
                    $v = date_create_from_format('m/d/Y', $v)->format('Y-m-d');
                } elseif (preg_match('/%$/', $v) === 1) {
                    $v = (float) str_replace('%', '', $v);
                    $v = round($v / 100, 4);
                } else {
                    $v = round((float) $v, 2);
                };
                $data[$i][$colNames[$j]] = $v;
            }
        }

        $model = $modelName::truncate();
        foreach ($data as $row) {
            $model->create($row);
        }
    }
})->purpose('Importa os dados do Excel.');
