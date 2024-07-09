@extends('app')

@section('dimensionName')
    Índices Constitucionais e Legais
@endsection

@section('dimensionHref')
    {{ route('indices.resumo', ['periodo' => $periodo]) }}
@endsection

@section('panelName')
    MDE
@endsection

@section('content')
    <div class="ui loading segment" id="chart1-wrapper">
        <div id="chart1" style="width: 100%; height: 400px"></div>
        <div class="ui info message">
            <p>Esse gráfico exibe o valor mínimo a aplicar em substituição da exibição da receita porque incluir a receita
                dificultaria a avaliação da distância entre mínimo e valor aplicado.</p>
            <p>Tendo em vista que o valor mínimo está em função direta com a receita, a variação do valor mínimo corresponde
                a uma variação proporcionalmente igual da receita, possibilitando de forma indireta a avaliação entre
                variação da receita e da despesa.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.collection.mde', ['periodo' => $periodo]) }}', function(response) {
            $('#chart1-wrapper').removeClass('loading');
            let myChart = echarts.init(document.getElementById('chart1'));
            let option = {
                title: {
                    text: 'Manutenção e Desenvolvimento do Ensino',
                    subtext: 'Evolução mensal no ano'
                },
                legend: {
                    data: ['Despesa', 'Mínimo'],
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
                        name: '% apurado',
                        show: false,
                        min: 0,
                        max: 100,
                    }
                ],
                series: [{
                        name: 'Despesa',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.blue,
                        data: response.data.map(item => item.despesa_bc)
                    },
                    {
                        name: 'Mínimo',
                        type: 'line',
                        smooth: true,
                        color: colorPalette.violet,
                        data: response.data.map(item => item.vl_minimo)
                    },
                    {
                        name: '% apurado',
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
                            if (perc < (item.perc_minimo * 100)) {
                                return {
                                    value: perc,
                                    itemStyle: {
                                        color: colorPalette.red
                                    }
                                };
                            } else {
                                return {
                                    value: perc,
                                    itemStyle: {
                                        color: colorPalette.green
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
