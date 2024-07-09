@extends('app')

@section('dimensionName')
    Indicadores
@endsection

@section('dimensionHref')
    {{ route('indicadores.resumo', ['periodo' => $periodo]) }}
@endsection

@section('panelName')
    Dotação para Folha de Pagamento
@endsection

@section('content')
    <div class="ui loading olive segment" id="chart1-wrapper">
        <div id="chart1" style="width: 100%; height: 400px"></div>
    </div>

    <div class="ui loading purple segment" id="chart2-wrapper">
        <div id="chart2" style="width: 100%; height: 400px"></div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.collection.indicadores.dotacao.folha', ['periodo' => $periodo]) }}', function(
            response) {
            console.log(response);

            // chart1
            $('#chart1-wrapper').removeClass('loading');
            let myChart1 = echarts.init(document.getElementById('chart1'));
            let option1 = {
                title: {
                    text: 'Dotação para Folha de Pagamento',
                    subtext: 'Modificações no superávit/déficit da dotação.'
                },
                legend: {
                    left: 0,
                    top: 60,
                },
                tooltip: {
                    trigger: 'axis',
                    valueFormatter: (value) => {
                        if (value == '') return '';
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
                    axisLabel: {
                        formatter: (value) => parseFloat(value).toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        }),
                    }
                }, ],
                series: [{
                        name: 'Superávit',
                        type: 'bar',
                        stack: 'Total',
                        label: {
                            show: true,
                            position: 'top',
                            formatter: (item) => {
                                if (item.value == '') return '';
                                return parseFloat(item.value).toLocaleString('pt-BR', {
                                    style: 'currency',
                                    currency: 'BRL'
                                })
                            },
                        },
                        color: colorPalette.green,
                        data: response.data.map(item => (item.resultado > 0) ? item.resultado : '')
                    },
                    {
                        name: 'Déficit',
                        type: 'bar',
                        color: colorPalette.red,
                        stack: 'Total',
                        label: {
                            show: true,
                            position: 'bottom',
                            color: colorPalette.red,
                            formatter: (item) => {
                                if (item.value == '') return '';
                                return parseFloat(item.value).toLocaleString('pt-BR', {
                                    style: 'currency',
                                    currency: 'BRL'
                                })
                            },
                        },
                        data: response.data.map(item => (item.resultado < 0) ? item.resultado : '')
                    },
                ]
            };
            myChart1.setOption(option1);


            // chart2
            $('#chart2-wrapper').removeClass('loading');
            let myChart2 = echarts.init(document.getElementById('chart2'));
            let option2 = {
                title: {
                    text: 'Dotação para Folha de Pagamento',
                    subtext: 'Evolução da dotação atualizada e da dotação necessária.'
                },
                legend: {
                    left: 0,
                    top: 60,
                },
                tooltip: {
                    trigger: 'axis',
                    valueFormatter: (value) => {
                        if (value == '') return '';
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
                    axisLabel: {
                        formatter: (value) => parseFloat(value).toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        }),
                    }
                }, ],
                series: [{
                        name: 'Dotação Atualizada',
                        type: 'line',
                        color: colorPalette.purple,
                        data: response.data.map(item => item.dotacao_atualizada)
                    },
                    {
                        name: 'Dotação Necessária',
                        type: 'line',
                        color: colorPalette.brown,
                        data: response.data.map(item => item.dotacao_necessaria)
                    },
                ]
            };
            myChart2.setOption(option2);

        });
    </script>
@endpush
