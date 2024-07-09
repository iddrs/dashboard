<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite(['node_modules/fomantic-ui/dist/semantic.min.css', 'resources/css/app.css', 'resources/js/app.js', 'node_modules/fomantic-ui/dist/semantic.min.js'])

</head>

<body>

    <div class="ui top fixed menu">
        <div class="item">
            <a id="sidebar-toggle">
                <i class="sidebar icon"></i>
            </a>
        </div>

        <div class="item">{{ config('app.name') }}</div>

        <div class="item">
            <div class="ui breadcrumb">
                <a href="{{ route('index', ['periodo' => $periodo]) }}">Dashboard</a>
                @hasSection('dimensionName')
                    <div class="divider"> / </div>
                    <a href="@yield('dimensionHref')" class="section">
                        @yield('dimensionName')
                    </a>
                @endif
                @hasSection('panelName')
                    <div class="divider"> / </div>
                    <div class="active section">
                        @yield('panelName')
                    </div>
                @endif
            </div>
        </div>

        <div class="right item">
            <div class="ui icon buttons">
                <a class="ui button"
                    href="{{ route(Route::getCurrentRoute()->getName(), ['periodo' => periodo_previous($periodo)]) }}">
                    <i class="angle left icon"></i>
                </a>
                <div class="ui basic button">
                    {{ periodo_fmt($periodo) }}
                </div>
                <a class="ui button"
                    href="{{ route(Route::getCurrentRoute()->getName(), ['periodo' => periodo_next($periodo)]) }}">
                    <i class="angle right icon"></i>
                </a>
            </div>
        </div>
    </div>


    <div class="ui inverted flyout" id="sidebar">
        <i class="close icon"></i>
        <div class="ui header">
            <i class="tachometer alternate icon"></i>
            <div class="content">
                Dimensões / Painéis
            </div>
        </div>
        <div class="scrolling content">
            <div class="ui vertical inverted text menu">
                <div class="item">
                    <a class="header" href="{{ route('indices.resumo') }}">Índices Constitucionais e Legais</a>
                    <div class="menu">
                        <a class="item" href="{{ route('indices.mde', ['periodo' => $periodo]) }}">MDE</a>
                        <a class="item" href="{{ route('indices.fundeb70', ['periodo' => $periodo]) }}">Remuneração do
                            Fundeb</a>
                        <a class="item" href="{{ route('indices.asps', ['periodo' => $periodo]) }}">ASPS</a>
                        <a class="item" href="{{ route('indices.dtp', ['periodo' => $periodo]) }}">Despesa com
                            Pessoal
                            (LRF)</a>
                    </div>
                </div>
                <div class="item">
                    <a class="header" href="{{ route('receitas.resumo', ['periodo' => $periodo]) }}">Receitas</a>
                    <div class="menu">
                        <a class="item" href="{{ route('receitas.total', ['periodo' => $periodo]) }}">Receita Total</a>
                        <a class="item" href="{{ route('receitas.correntes', ['periodo' => $periodo]) }}">Receita Corrente</a>
                        <a class="item" href="{{ route('receitas.propria', ['periodo' => $periodo]) }}">Arrecadação Própria</a>
                        <a class="item" href="{{ route('receitas.transfcorrentes', ['periodo' => $periodo]) }}">Transferências Correntes</a>
                        <a class="item" href="{{ route('receitas.transfcorrentesbr', ['periodo' => $periodo]) }}">Transferências Correntes da União</a>
                        <a class="item" href="{{ route('receitas.transfcorrentesrs', ['periodo' => $periodo]) }}">Transferências Correntes do Estado</a>
                        <a class="item" href="{{ route('receitas.transfcorrentessaude', ['periodo' => $periodo]) }}">Transferências Correntes da Saúde</a>
                        <a class="item" href="{{ route('receitas.transfcorrenteseducacao', ['periodo' => $periodo]) }}">Transferências Correntes da Educação</a>
                        <a class="item" href="{{ route('receitas.transfcorrentesassistencia', ['periodo' => $periodo]) }}">Transferências Correntes da Assistência Social</a>
                        <a class="item" href="{{ route('receitas.fpm', ['periodo' => $periodo]) }}">FPM</a>
                        <a class="item" href="{{ route('receitas.icms', ['periodo' => $periodo]) }}">ICMS</a>
                        <a class="item" href="{{ route('receitas.fundeb', ['periodo' => $periodo]) }}">Fundeb</a>
                    </div>
                </div>
                <div class="item">
                    <a class="header" href="{{ route('despesas.resumo', ['periodo' => $periodo]) }}">Despesas</a>
                    <div class="menu">
                        <a class="item" href="{{ route('despesas.total', ['periodo' => $periodo]) }}">Despesa Total</a>
                        <a class="item" href="{{ route('despesas.corrente', ['periodo' => $periodo]) }}">Despesa Corrente</a>
                        <a class="item" href="{{ route('despesas.pessoal', ['periodo' => $periodo]) }}">Despesa com Pessoal e Encargos Sociais</a>
                    </div>
                </div>
                <div class="item">
                    <a class="header" href="{{ route('indicadores.resumo', ['periodo' => $periodo]) }}">Indicadores</a>
                    <div class="menu">
                        <a class="item" href="{{ route('indicadores.dotacao.folha', ['periodo' => $periodo]) }}">Dotação da Folha</a>
                        <a class="item" href="{{ route('indicadores.dotacao.vale', ['periodo' => $periodo]) }}">Dotação do Vale-Alimentação</a>
                        <a class="item" href="{{ route('indicadores.disponibilidade', ['periodo' => $periodo]) }}">Disponibilidades Livres</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="actions">
            <div class="ui red cancel button">
                <i class="remove icon"></i>
                No
            </div>
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Yes
            </div>
        </div> --}}
    </div>

    <br>
    <br>
    <br>

    <div class="pusher">
        <div class="ui segment">
            @yield('content')
        </div>
        <br>
        <br>
    </div>

    <div class="ui bottom fixed text menu">
        <div class="item">
            <a href="https://everton3x.github.io" target="_blank">Everton da Rosa</a>
        </div>
        <div class="item">&copy; 2024. Todos os direitos reservados.</div>
        <div class="right menu">
            <div class="item">Desenvolvido com:</div>
            <div class="item"><a href="https://php.net">PHP</a></div>
            <div class="item"><a href="https://laravel.com">Laravel</a></div>
            <div class="item"><a href="https://fomantic-ui.com">Fomantic UI</a></div>
            <div class="item"><a href="https://jquery.com/">jQuery</a></div>
            <div class="item"><a href="https://echarts.apache.org/">ECHarts</a></div>
        </div>
    </div>


    <script type="module">
        $('#sidebar-toggle').on('click', function() {
            $('#sidebar')
                .flyout({
                    blurring: true
                })
                .flyout('toggle');
        });
    </script>

    @stack('scripts')
</body>

</html>
