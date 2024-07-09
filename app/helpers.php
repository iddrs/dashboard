<?php

function money_fmt(string|int|float|null $amount, int $decimals = 2): string
{
    if(is_null($amount)) return '';
    return number_format($amount, $decimals, '.', ',');
}

function percentual_fmt(string|int|float|null $amount, int $decimals = 2): string
{
    if(is_null($amount)) return '';
    return number_format($amount * 100, $decimals, '.', ',').'%';
}

function periodo_fmt(string $periodo): string
{
    $splitted = explode('-', $periodo);
    $ano = (int) $splitted[0];
    $mes = (int) $splitted[1];

    $meses = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
    ];

    return sprintf('%s de %s', $meses[$mes], $ano);
}

function data_base(string $periodo): string
{
    $ultimoDia = date('t', strtotime("$periodo-01"));
    return date('Y-m-d', strtotime("$periodo-$ultimoDia"));
}

function periodo_previous(string $periodo): string
{
    $splitted = explode('-', $periodo);
    $ano = (int) $splitted[0];
    $mes = (int) $splitted[1];
    if($mes == 1) {
        $mes = 12;
        $ano--;
    } else {
        $mes--;
    }
    return sprintf('%04d-%02d', $ano, $mes);
}

function periodo_next(string $periodo): string
{
    $splitted = explode('-', $periodo);
    $ano = (int) $splitted[0];
    $mes = (int) $splitted[1];
    if($mes == 12) {
        $mes = 1;
        $ano++;
    } else {
        $mes++;
    }
    return sprintf('%04d-%02d', $ano, $mes);
}
