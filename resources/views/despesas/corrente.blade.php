@extends('app')

@section('dimensionName')
    Despesas
@endsection

@section('dimensionHref')
    {{ route('despesas.resumo', ['periodo' => $periodo]) }}
@endsection

@section('panelName')
    Despesa Corrente
@endsection

@section('content')
    <div class="ui loading red segment" id="stat1-wrapper">
        <div class="ui three mini red statistics">
            <div class="statistic">
                <div class="value" id="stat-acum">
                    --
                </div>
                <div class="label">
                    Empenhado acumulado
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-acum-ant">
                    --
                </div>
                <div class="label">
                    <div>Ano anterior</div>
                    <div>&ne;</div>
                    <div>Empenhado total</div>
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-acum-rec">
                    --
                </div>
                <div class="label">
                    <div>Receita Corrente</div>
                    <div>&ne;</div>
                    <div>Empenhado total</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui loading red segment" id="chart1-wrapper">
        <div id="chart1" style="width: 100%; height: 400px"></div>
        <div class="ui info message">
            <p>Esta visualização mostra os valores empenhados acumulados no ano até o mês de referência, comparando-o com a receita arrecadada e como o valor empenhado acumulado no ano anterior até o mesmo mês de referência.</p>
        </div>
    </div>


    <div class="ui loading orange segment" id="stat2-wrapper">

        <div class="ui three mini orange statistics">

            <div class="statistic">
                <div class="value" id="stat-mes">
                    --
                </div>
                <div class="label">
                    Empenhado no mês
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-mes-ant">
                    --
                </div>
                <div class="label">
                    <div>Mês do ano anterior</div>
                    <div>&ne;</div>
                    <div>Empenhado no mês</div>
                </div>
            </div>
            <div class="statistic">
                <div class="value" id="stat-mes-rec">
                    --
                </div>
                <div class="label">
                    <div>Receita Corrente</div>
                    <div>&ne;</div>
                    <div>Empenhado no mês</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui loading orange segment" id="chart2-wrapper">
        <div id="chart2" style="width: 100%; height: 400px"></div>
        <div class="ui info message">
            <p>Esta visualização mostra os valores empenhados mês a mês do ano, comparando-o com a receita arrecadada mês a mês e como o valor empenhado mês a mês do ano anterior.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.collection.despesas.corrente', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);

            // chart1
            $('#chart1-wrapper').removeClass('loading');
            let myChart1 = echarts.init(document.getElementById('chart1'));
            let option1 = {
                title: {
                    text: 'Despesa Corrente',
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
                        color: colorPalette.red,
                        itemStyle: {
                            opacity: 0.5
                        },
                        data: response.data.map(item => item.emp_ant_acum)
                    },
                    {
                        name: 'Receita Corrente',
                        type: 'bar',
                        color: colorPalette.green,
                        data: response.data.map(item => item.receita_corrente_acum)
                    },
                    {
                        name: 'Empenhado',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.red,
                        data: response.data.map(item => item.emp_acum)
                    },
                ]
            };
            myChart1.setOption(option1);



            // chart2
            $('#chart2-wrapper').removeClass('loading');
            let myChart2 = echarts.init(document.getElementById('chart2'));
            let option2 = {
                title: {
                    text: 'Despesa Corrente',
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
                        color: colorPalette.red,
                        itemStyle: {
                            opacity: 0.5
                        },
                        data: response.data.map(item => item.emp_anterior_mes)
                    },
                    {
                        name: 'Receita Corrente',
                        type: 'bar',
                        color: colorPalette.green,
                        data: response.data.map(item => item.receita_corrente_mes)
                    },
                    {
                        name: 'Empenhado',
                        type: 'bar',
                        color: colorPalette.red,
                        data: response.data.map(item => item.emp_mes)
                    },
                ]
            };
            myChart2.setOption(option2);
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.despesas.corrente', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);

            $('#stat1-wrapper').removeClass('loading');
            $('#stat2-wrapper').removeClass('loading');

            $('#stat-acum').empty().text(response.data.emp_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#stat-mes').empty().text(response.data.emp_mes.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));

            $('#stat-acum-ant').empty().text(
                response.data.dif_emp_ant_acum_vl.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) +
                ' (' + (response.data.dif_emp_ant_acum_perc * 100).toLocaleString('pt-BR') + '%)'
            );
            $('#stat-acum-rec').empty().text(
                response.data.dif_emp_receita_acum_vl.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) +
                ' (' + (response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR') + '%)'
            );

            $('#stat-mes-ant').empty().text(
                response.data.dif_emp_ant_mes_vl.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) +
                ' (' + (response.data.dif_emp_ant_mes_perc * 100).toLocaleString('pt-BR') + '%)'
            );
            $('#stat-mes-rec').empty().text(
                response.data.dif_emp_receita_mes_vl.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) +
                ' (' + (response.data.dif_emp_receita_mes_perc * 100).toLocaleString('pt-BR') + '%)'
            );
        });
    </script>
@endpush
