@extends('app')

@section('dimensionName')
    Índices Constitucionais e Legais
@endsection

@section('dimensionHref')
{{ route('indices.resumo', ['periodo'=> $periodo]) }}
@endsection

{{-- @section('panelName')
    Resumo
@endsection --}}

@section('content')
    <div class="ui cards">

        {{-- mde --}}
        <div class="ui centered blue card" id="mde-placeholder">
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
        </div>

        <div class="ui centered blue card" style="display: none" id="mde-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted blue statistic">
                    <div class="value" id="mde-perc-apurado"></div>
                    <div class="label">Apurado</div>
                </div>
            </div>
            <div class="content">
                <div class="header">MDE</div>
                <div class="meta">Mínimo de <span id="mde-perc-minimo"></span></div>
                <div class="description">
                    <p>Aplicação de receita decorrentes de impostos em Manutenção e Desenvolvimento do Ensino.</p>
                    <p>O percentual apurado representa a despesa dividida pela receita que compõem base de cálculo.</p>
                    <p>A receita e despesa são apuradas acumuladas desde o início do ano.</p>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated blue button" href="{{ route('indices.mde', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- fundeb70 --}}
        <div class="ui centered blue card" id="fundeb70-placeholder">
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
        </div>

        <div class="ui centered blue card" style="display: none" id="fundeb70-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted blue statistic">
                    <div class="value" id="fundeb70-perc-apurado"></div>
                    <div class="label">Apurado</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Remuneração do Fundeb</div>
                <div class="meta">Mínimo de <span id="fundeb70-perc-minimo"></span></div>
                <div class="description">
                    <p>Aplicação da receita do Fundeb na remuneração dos profissionais da Educação.</p>
                    <p>O percentual apurado representa a despesa dividida pela receita que compõem base de cálculo.</p>
                    <p>A receita e despesa são apuradas acumuladas desde o início do ano.</p>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated blue button" href="{{ route('indices.fundeb70', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- asps --}}
        <div class="ui centered teal card" id="asps-placeholder">
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
                <div class="ui right floated disabled teal button">Painel</div>
            </div>
        </div>

        <div class="ui centered teal card" style="display: none" id="asps-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted teal statistic">
                    <div class="value" id="asps-perc-apurado"></div>
                    <div class="label">Apurado</div>
                </div>
            </div>
            <div class="content">
                <div class="header">ASPS</div>
                <div class="meta">Mínimo de <span id="asps-perc-minimo"></span></div>
                <div class="description">
                    <p>Aplicação de receita decorrentes de impostos em ações e serviços públicos de Saúde.</p>
                    <p>O percentual apurado representa a despesa dividida pela receita que compõem base de cálculo.</p>
                    <p>A receita e despesa são apuradas acumuladas desde o início do ano.</p>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated teal button" href="{{ route('indices.asps', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- dtp --}}
        <div class="ui centered violet card" id="dtp-placeholder">
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
                <div class="ui right floated disabled violet button">Painel</div>
            </div>
        </div>

        <div class="ui centered violet card" style="display: none" id="dtp-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted violet statistic">
                    <div class="value" id="dtp-perc-apurado"></div>
                    <div class="label">Apurado</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Despesa Total com Pessoal (LRF)</div>
                <div class="meta">Limites: <span id="dtp-perc-limite-alerta"></span> ~ <span id="dtp-perc-limite-prudencial"></span> ~ <span id="dtp-perc-limite-legal"></span></div>
                <div class="description">
                    <p>Participação da Despesa Total com Pessoal sobre a Receita Corrente Líquida.</p>
                    <p>O percentual é utilizado para apuração do cumprimento do limite de gasto com pessoal da LRF.</p>
                    <p>A receita e despesa são apuradas acumuladas nos últimos 12 meses.</p>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated violet button" href="{{ route('indices.dtp', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.mde', ['periodo' => $periodo]) }}', function(response) {
            $('#mde-placeholder').css('display', 'none');
            $('#mde-perc-apurado').empty().text((response.data.perc_apurado * 100).toLocaleString('pt-BR') + '%');
            $('#mde-perc-minimo').empty().text((response.data.perc_minimo * 100).toLocaleString('pt-BR') + '%');
            $('#mde-card').removeAttr('style');

        });
        loadData('{{ route('resources.fundeb70', ['periodo' => $periodo]) }}', function(response) {
            $('#fundeb70-placeholder').css('display', 'none');
            $('#fundeb70-perc-apurado').empty().text((response.data.perc_apurado * 100).toLocaleString('pt-BR') + '%');
            $('#fundeb70-perc-minimo').empty().text((response.data.perc_minimo * 100).toLocaleString('pt-BR') + '%');
            $('#fundeb70-card').removeAttr('style');
        });
        loadData('{{ route('resources.asps', ['periodo' => $periodo]) }}', function(response) {
            $('#asps-placeholder').css('display', 'none');
            $('#asps-perc-apurado').empty().text((response.data.perc_apurado * 100).toLocaleString('pt-BR') + '%');
            $('#asps-perc-minimo').empty().text((response.data.perc_minimo * 100).toLocaleString('pt-BR') + '%');
            $('#asps-card').removeAttr('style');
        });
        loadData('{{ route('resources.dtp', ['periodo' => $periodo]) }}', function(response) {
            $('#dtp-placeholder').css('display', 'none');
            $('#dtp-perc-apurado').empty().text((response.data.perc_apurado * 100).toLocaleString('pt-BR') + '%');
            $('#dtp-perc-limite-alerta').empty().text((response.data.perc_limite_alerta * 100).toLocaleString('pt-BR') + '%');
            $('#dtp-perc-limite-prudencial').empty().text((response.data.perc_limite_prudencial * 100).toLocaleString('pt-BR') + '%');
            $('#dtp-perc-limite-legal').empty().text((response.data.perc_limite_legal * 100).toLocaleString('pt-BR') + '%');
            $('#dtp-card').removeAttr('style');
        });
    </script>
@endpush
