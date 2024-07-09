@extends('app')

@section('dimensionName')
    Índices Constitucionais e Legais
@endsection

@section('dimensionHref')
    {{ route('indices.resumo', ['periodo' => $periodo]) }}
@endsection

@section('panelName')
    Despesa Total com Pessoal (LRF)
@endsection

@section('content')
    <div class="ui loading segment" id="chart1-wrapper">
        <div id="chart1" style="width: 100%; height: 400px"></div>
        <div class="ui info message">
            <p>Esse gráfico exibe os limites prudencial, de alerta e legal em substituição da exibição da Receita Corrente
                Líquida porque incluir a RCL dificultaria a avaliação da distância entre os limites e valor da despesa.</p>
            <p>Tendo em vista que o valor dos limites está em função direta com a RCL, a variação dos limites corresponde a
                uma variação proporcionalmente igual da RCL, possibilitando de forma indireta a avaliação entre variação da
                RCL e da despesa.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.collection.dtp', ['periodo' => $periodo]) }}', function(response) {
            $('#chart1-wrapper').removeClass('loading');
            let myChart = echarts.init(document.getElementById('chart1'));
            let option = {
                title: {
                    text: 'Despesa Total com Pessoal',
                    subtext: 'Evolução mensal dos últimos 12 meses'
                },
                legend: {
                    data: ['DTP', 'Limite de Alerta', 'Limite Prudencial', 'Limite Legal'],
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
                    {
                        type: 'value',
                        name: '% DTP/RCL',
                        show: false,
                        min: 0,
                        max: 100,
                        axisLabel: {
                            formatter: '{value}%'
                        }
                    }
                ],
                series: [{
                        name: 'DTP',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.blue,
                        data: response.data.map(item => item.dtp)
                    },
                    {
                        name: 'Limite Alerta',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.orange,
                        data: response.data.map(item => item.vl_limite_alerta)
                    },
                    {
                        name: 'Limite Prudencial',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.red,
                        data: response.data.map(item => item.vl_limite_prudencial)
                    },
                    {
                        name: 'Limite Legal',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.black,
                        data: response.data.map(item => item.vl_limite_legal)
                    },
                    {
                        name: '% DTP/RCL',
                        type: 'bar',
                        yAxisIndex: 1,
                        label: {
                            show: true,
                            position: 'top',
                            formatter: function(params, ticket, callback) {
                                return parseFloat(params.value).toLocaleString('pt-BR') + '%';
                            }
                        },
                        data: response.data.map(item => {
                            let perc = (item.perc_apurado * 100).toFixed(2);
                            if (perc > (item.perc_limite_alerta * 100)) {
                                return {
                                    value: perc,
                                    itemStyle: {
                                        color: colorPalette.red
                                    }
                                };
                            } else if (perc > (item.perc_limite_prudencial * 100)) {
                                return {
                                    value: perc,
                                    itemStyle: {
                                        color: colorPalette.green
                                    }
                                };
                            } else if (perc > (item.perc_limite_legal * 100)) {
                                return {
                                    value: perc,
                                    itemStyle: {
                                        color: '#1b1c1d'
                                    }
                                };
                            } else {
                                return {
                                    value: perc,
                                    itemStyle: {
                                        color: '#21ba45'
                                    }
                                };
                            }
                        })
                    }
                ]
            };
            myChart.setOption(option);
        });
    </script>
@endpush
