@extends('app')

@section('dimensionName')
    Indicadores Gerenciais
@endsection

@section('dimensionHref')
    {{ route('indicadores.resumo', ['periodo' => $periodo]) }}
@endsection

{{-- @section('panelName')
    Resumo
@endsection --}}

@section('content')
    <div class="ui cards">

        {{-- dotação folha --}}
        <div class="ui centered magenta card" id="dotacao-folha-placeholder">
            <div class="image">
                <div class="ui placeholder">
                    <div class="image"></div>
                </div>
            </div>
            <div class="content">
                <div class="ui placeholder">
                    <div class="header">
                        <div class="short line"></div>
                        <div class="medium line"></div>
                    </div>
                    <div class="paragraph">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <div class="ui right floated disabled magenta button">Painel</div>
            </div>
        </div><!-- placeholder -->

        <div class="ui centered olive card" style="display: none" id="dotacao-folha-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted mini statistic" id="dotacao-folha-resultado">
                    <div class="value"></div>
                    <div class="label"></div>
                </div>
            </div><!-- top segment -->
            <div class="content">
                <div class="header">Dotação da Folha</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="dotacao-folha-atualizada">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Dotação Atualizada
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="dotacao-folha-necessaria">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Dotação Necessária
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('indicadores.dotacao.folha', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div> <!-- ui centerd card -->





        {{-- dotação vale --}}
        <div class="ui centered purple card" id="dotacao-vale-placeholder">
            <div class="image">
                <div class="ui placeholder">
                    <div class="image"></div>
                </div>
            </div>
            <div class="content">
                <div class="ui placeholder">
                    <div class="header">
                        <div class="short line"></div>
                        <div class="medium line"></div>
                    </div>
                    <div class="paragraph">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <div class="ui right floated disabled purple button">Painel</div>
            </div>
        </div><!-- placeholder -->

        <div class="ui centered purple card" style="display: none" id="dotacao-vale-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted mini statistic" id="dotacao-vale-resultado">
                    <div class="value"></div>
                    <div class="label"></div>
                </div>
            </div><!-- top segment -->
            <div class="content">
                <div class="header">Dotação do Vale-Alimentação</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="dotacao-vale-atualizada">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Dotação Atualizada
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="dotacao-vale-necessaria">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Dotação Necessária
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('indicadores.dotacao.vale', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div> <!-- ui centerd card -->



        {{-- disponivel livre --}}
        <div class="ui centered blue card" id="disponibilidade-placeholder">
            <div class="image">
                <div class="ui placeholder">
                    <div class="image"></div>
                </div>
            </div>
            <div class="content">
                <div class="ui placeholder">
                    <div class="header">
                        <div class="short line"></div>
                        <div class="medium line"></div>
                    </div>
                    <div class="paragraph">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <div class="ui right floated disabled blue button">Painel</div>
            </div>
        </div><!-- placeholder -->

        <div class="ui centered blue card" style="display: none" id="disponibilidade-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted mini statistic" id="disponibilidade-disponivel_liquido">
                    <div class="value"></div>
                    <div class="label"></div>
                </div>
            </div><!-- top segment -->
            <div class="content">
                <div class="header">Disponibilidade Livre</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="disponibilidade-saldo_financeiro">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Saldo Financeiro
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="disponibilidade-disponivel_bruto">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Disponível Bruto
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('indicadores.disponibilidade', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div> <!-- ui centerd card -->


    </div> <!-- ui cards -->
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.indicadores.dotacao.folha', ['periodo' => $periodo]) }}', function(response) {
            $('#dotacao-folha-placeholder').css('display', 'none');
            $('#dotacao-folha-resultado>.value').empty().text(response.data.resultado.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#dotacao-folha-resultado>.label').empty().text((response.data.resultado > 0) ? 'Superávit' :
                'Déficit');
            if(response.data.resultado > 0) {
                $('#dotacao-folha-resultado').addClass('green');
            } else {
                $('#dotacao-folha-resultado').addClass('red');
            }
            $('#dotacao-folha-atualizada').empty().text(response.data.dotacao_atualizada.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#dotacao-folha-necessaria').empty().text(response.data.dotacao_necessaria.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#dotacao-folha-card').removeAttr('style');

        });
    </script>

    <script type="module">
        loadData('{{ route('resources.indicadores.dotacao.vale', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#dotacao-vale-placeholder').css('display', 'none');
            $('#dotacao-vale-resultado>.value').empty().text(response.data.resultado.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#dotacao-vale-resultado>.label').empty().text((response.data.resultado > 0) ? 'Superávit' :
                'Déficit');
            if(response.data.resultado > 0) {
                $('#dotacao-vale-resultado').addClass('green');
            } else {
                $('#dotacao-vale-resultado').addClass('red');
            }
            $('#dotacao-vale-atualizada').empty().text(response.data.dotacao_atualizada.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#dotacao-vale-necessaria').empty().text(response.data.dotacao_necessaria.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#dotacao-vale-card').removeAttr('style');

        });
    </script>

    <script type="module">
        loadData('{{ route('resources.indicadores.disponibilidade', ['periodo' => $periodo]) }}', function(response) {
            $('#disponibilidade-placeholder').css('display', 'none');
            $('#disponibilidade-disponivel_liquido>.value').empty().text(response.data.disponivel_liquido.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#disponibilidade-disponivel_liquido>.label').empty().text((response.data.disponivel_liquido > 0) ? 'Superávit' :
                'Déficit');
            if(response.data.disponivel_liquido > 0) {
                $('#disponibilidade-disponivel_liquido').addClass('green');
            } else {
                $('#disponibilidade-disponivel_liquido').addClass('red');
            }
            $('#disponibilidade-saldo_financeiro').empty().text(response.data.saldo_financeiro.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#disponibilidade-disponivel_bruto').empty().text(response.data.disponivel_bruto.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#disponibilidade-card').removeAttr('style');

        });
    </script>
@endpush
