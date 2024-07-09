@extends('app')

@section('dimensionName')
    Indicadores
@endsection

@section('dimensionHref')
    {{ route('indicadores.resumo', ['periodo' => $periodo]) }}
@endsection

@section('panelName')
    Disponibilidade Livre
@endsection

@section('content')
    <div class="ui loading blue segment" id="chart1-wrapper">
        <div id="chart1" style="width: 100%; height: 400px"></div>
    </div>

    <div class="ui loading violet segment" id="chart2-wrapper">
        <div id="chart2" style="width: 100%; height: 400px"></div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.collection.indicadores.disponibilidade', ['periodo' => $periodo]) }}', function(
            response) {
            console.log(response);

            // chart1
            $('#chart1-wrapper').removeClass('loading');
            let myChart1 = echarts.init(document.getElementById('chart1'));
            let option1 = {
                title: {
                    text: 'Disponibilidade Livre',
                    subtext: 'Evolução no ano do valor líquido.'
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
                        data: response.data.map(item => (item.disponivel_liquido > 0) ? item.disponivel_liquido : '')
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
                        data: response.data.map(item => (item.disponivel_liquido < 0) ? item.disponivel_liquido : '')
                    },
                ]
            };
            myChart1.setOption(option1);


            // chart2
            $('#chart2-wrapper').removeClass('loading');
            let myChart2 = echarts.init(document.getElementById('chart2'));
            let option2 = {
                title: {
                    text: 'Disponibilidade Livre',
                    subtext: 'Evolução dos componentes.'
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
                        name: 'Saldo Financeiro',
                        type: 'line',
                        // color: colorPalette.violet,
                        data: response.data.map(item => item.saldo_financeiro)
                    },
                    {
                        name: 'Restos a Pagar',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.restos_pagar)
                    },
                    {
                        name: 'Empenhado a Pagar',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.empenhado_pagar)
                    },
                    {
                        name: 'Duodécimo a Repassar',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.duodecimo_repassar)
                    },
                    {
                        name: 'Outras Obrigações',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.outras_obrigacoes)
                    },
                    {
                        name: 'Disponível Bruto',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.disponivel_bruto)
                    },
                    {
                        name: 'Reservas',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.reservas)
                    },
                    {
                        name: 'Disponível Líquido',
                        type: 'line',
                        // color: colorPalette.brown,
                        data: response.data.map(item => item.disponivel_liquido)
                    },
                ]
            };
            myChart2.setOption(option2);

        });
    </script>
@endpush
