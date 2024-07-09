@extends('app')

@section('dimensionName')
    Receitas
@endsection

@section('dimensionHref')
    {{ route('receitas.resumo', ['periodo' => $periodo]) }}
@endsection

@section('panelName')
    FPM
@endsection

@section('content')
    <div class="ui loading blue segment" id="stat1-wrapper">
        <div class="ui three mini blue statistics">
            <div class="statistic">
                <div class="value" id="stat-acum">
                    --
                </div>
                <div class="label">
                    Arrecadado acumulado
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-acum-ant">
                    --
                </div>
                <div class="label">
                    <div>Ano anterior</div>
                    <div>&ne;</div>
                    <div>Arrecadado total</div>
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-acum-prev">
                    --
                </div>
                <div class="label">
                    <div>Previsto na LOA</div>
                    <div>&ne;</div>
                    <div>Arrecadado total</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui loading blue segment" id="chart1-wrapper">
        <div id="chart1" style="width: 100%; height: 400px"></div>
        <div class="ui info message">
            <p>Essa visualização apresenta a variação mês a mês da receita acumulada no ano selecionado comparando o valor
                arrecadado até o mesmo mês do ano anterior e o valor previsto na LOA para ser arrecadado até o mês
                selecionado.</p>
            <p>Os valores são líquidos das deduções da receita e incluem eventuais receitas intra-orçamentárias.</p>
        </div>
    </div>


    <div class="ui loading violet segment" id="stat2-wrapper">

        <div class="ui three mini violet statistics">

            <div class="statistic">
                <div class="value" id="stat-mes">
                    --
                </div>
                <div class="label">
                    Arrecadado no mês
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-mes-ant">
                    --
                </div>
                <div class="label">
                    <div>Mês do ano anterior</div>
                    <div>&ne;</div>
                    <div>Arrecadado no mês</div>
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-mes-prev">
                    --
                </div>
                <div class="label">
                    <div>Previsto para o mês na LOA</div>
                    <div>&ne;</div>
                    <div>Arrecadado no mês</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui loading violet segment" id="chart2-wrapper">
        <div id="chart2" style="width: 100%; height: 400px"></div>
        <div class="ui info message">
            <p>Essa visualização apresenta receita arrecadada em cada mês no ano selecionado comparando o valor arrecadado
                no mesmo mês do ano anterior e o valor previsto na LOA para ser arrecadado no mês selecionado.</p>
            <p>Os valores são líquidos das deduções da receita e incluem eventuais receitas intra-orçamentárias.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.collection.receitas.fpm', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);

            // chart1
            $('#chart1-wrapper').removeClass('loading');
            let myChart1 = echarts.init(document.getElementById('chart1'));
            let option1 = {
                title: {
                    text: 'FPM',
                    subtext: 'Valor acumulado.'
                },
                legend: {
                    left: 0,
                    top: 60
                },
                tooltip: {
                    trigger: 'axis',
                    valueFormatter: (value) => {
                        if (value < 100) return parseFloat(value).toLocaleString('pt-BR') + '%';
                        return parseFloat(value).toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        })
                    }
                },
                grid: {
                    top: '30%',
                    left: '2%',
                    right: '2%',
                    bottom: '2%',
                    containLabel: true
                },
                toolbox: {
                    feature: {
                        saveAsImage: {},
                        dataView: {
                            title: 'Dados Originais',
                            readOnly: true
                        },
                    }
                },
                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                },
                yAxis: [{
                        type: 'value',
                        name: 'R$',
                        min: 0,
                        axisLabel: {
                            formatter: (value) => parseFloat(value).toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            }),
                        }
                    },
                ],
                series: [{
                        name: 'Ano anterior',
                        type: 'bar',
                        color: colorPalette.blue,
                        itemStyle: {
                            opacity: 0.5
                        },
                        data: response.data.map(item => item.arrecadado_anterior_acum)
                    },
                    {
                        name: 'Previsto na LOA',
                        type: 'bar',
                        color: colorPalette.lightViolet,
                        data: response.data.map(item => item.previsto_loa_acum)
                    },
                    {
                        name: 'Arrecadado',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.blue,
                        data: response.data.map(item => item.arrecadado_acum)
                    },
                ]
            };
            myChart1.setOption(option1);



            // chart2
            $('#chart2-wrapper').removeClass('loading');
            let myChart2 = echarts.init(document.getElementById('chart2'));
            let option2 = {
                title: {
                    text: 'FPM',
                    subtext: 'Valor mês a mês.'
                },
                legend: {
                    left: 0,
                    top: 60
                },
                tooltip: {
                    trigger: 'axis',
                    valueFormatter: (value) => parseFloat(value).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    }),
                },
                grid: {
                    top: '30%',
                    left: '2%',
                    right: '2%',
                    bottom: '2%',
                    containLabel: true
                },
                toolbox: {
                    feature: {
                        saveAsImage: {},
                        dataView: {
                            title: 'Dados Originais',
                            readOnly: true
                        },
                    }
                },
                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                },
                yAxis: [{
                    type: 'value',
                    name: 'R$',
                    min: 0,
                    axisLabel: {
                        formatter: (value) => parseFloat(value).toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        }),
                    }
                }, ],
                series: [{
                        name: 'Ano anterior',
                        type: 'bar',
                        color: colorPalette.blue,
                        itemStyle: {
                            opacity: 0.5
                        },
                        data: response.data.map(item => item.arrecadado_anterior_mes)
                    },
                    {
                        name: 'Previsto na LOA',
                        type: 'bar',
                        color: colorPalette.lightViolet,
                        data: response.data.map(item => item.previsto_loa_mes)
                    },
                    {
                        name: 'Arrecadado',
                        type: 'bar',
                        color: colorPalette.blue,
                        data: response.data.map(item => item.arrecadado_mes)
                    },
                ]
            };
            myChart2.setOption(option2);
        });
    </script>

<script type="module">
    loadData('{{ route('resources.receitas.fpm', ['periodo' => $periodo]) }}', function(response) {
        console.log(response);

        $('#stat1-wrapper').removeClass('loading');
        $('#stat2-wrapper').removeClass('loading');

        $('#stat-acum').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }));
        $('#stat-mes').empty().text(response.data.arrecadado_mes.toLocaleString('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }));

        $('#stat-acum-ant').empty().text(
            response.data.dif_acum_arrec_ant_vl.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) +
            ' (' + (response.data.dif_acum_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%)'
        );
        $('#stat-acum-prev').empty().text(
            response.data.dif_acum_arrec_prev_vl.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) +
            ' (' + (response.data.dif_acum_arrec_prev_perc * 100).toLocaleString('pt-BR') + '%)'
        );

        $('#stat-mes-ant').empty().text(
            response.data.dif_mes_arrec_ant_vl.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) +
            ' (' + (response.data.dif_mes_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%)'
        );
        $('#stat-mes-prev').empty().text(
            response.data.dif_mes_arrec_prev_vl.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) +
            ' (' + (response.data.dif_mes_arrec_prev_perc * 100).toLocaleString('pt-BR') + '%)'
        );
    });
</script>
@endpush
