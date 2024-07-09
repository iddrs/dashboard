@extends('app')

@section('dimensionName')
    Receitas
@endsection

@section('dimensionHref')
    {{ route('receitas.resumo', ['periodo' => $periodo]) }}
@endsection

{{-- @section('panelName')
    Resumo
@endsection --}}

@section('content')
    <div class="ui cards">

        {{-- total --}}
        <div class="ui centered green card" id="total-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="total-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="total-statistic">
                    <div class="value" id="total-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Receita Total</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="total-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="total-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="total-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.total', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- receitas correntes --}}
        <div class="ui centered green card" id="correntes-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="correntes-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="correntes-statistic">
                    <div class="value" id="correntes-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Receita Corrente</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="correntes-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="correntes-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="correntes-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.correntes', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- arrecadação própria --}}
        <div class="ui centered green card" id="propria-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="propria-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="propria-statistic">
                    <div class="value" id="propria-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Arrecadação Própria</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="propria-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="propria-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="propria-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.propria', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- transferencias correntes --}}
        <div class="ui centered green card" id="transfcorrentes-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="transfcorrentes-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="transfcorrentes-statistic">
                    <div class="value" id="transfcorrentes-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Transferências Correntes</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentes-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentes-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="transfcorrentes-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.transfcorrentes', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- transferencias correntes br --}}
        <div class="ui centered green card" id="transfcorrentesbr-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="transfcorrentesbr-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="transfcorrentesbr-statistic">
                    <div class="value" id="transfcorrentesbr-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Transferências Correntes da União</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentesbr-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentesbr-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="transfcorrentesbr-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.transfcorrentesbr', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>



        {{-- transferencias correntes rs --}}
        <div class="ui centered green card" id="transfcorrentesrs-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="transfcorrentesrs-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="transfcorrentesrs-statistic">
                    <div class="value" id="transfcorrentesrs-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Transferências Correntes do Estado</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentesrs-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentesrs-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="transfcorrentesrs-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.transfcorrentesrs', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- transferencias correntes saúde --}}
        <div class="ui centered green card" id="transfcorrentessaude-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="transfcorrentessaude-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="transfcorrentessaude-statistic">
                    <div class="value" id="transfcorrentessaude-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Transferências Correntes da Saúde</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentessaude-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentessaude-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="transfcorrentessaude-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.transfcorrentessaude', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- transferencias correntes educação --}}
        <div class="ui centered green card" id="transfcorrenteseducacao-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="transfcorrenteseducacao-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="transfcorrenteseducacao-statistic">
                    <div class="value" id="transfcorrenteseducacao-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Transferências Correntes da Educação</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrenteseducacao-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrenteseducacao-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="transfcorrenteseducacao-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.transfcorrenteseducacao', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- transferencias correntes asssitência --}}
        <div class="ui centered green card" id="transfcorrentesassistencia-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="transfcorrentesassistencia-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="transfcorrentesassistencia-statistic">
                    <div class="value" id="transfcorrentesassistencia-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Transferências Correntes da Assistência Social</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentesassistencia-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="transfcorrentesassistencia-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="transfcorrentesassistencia-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.transfcorrentesassistencia', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- fpm --}}
        <div class="ui centered green card" id="fpm-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="fpm-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="fpm-statistic">
                    <div class="value" id="fpm-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">FPM</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="fpm-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="fpm-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="fpm-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.fpm', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- icms --}}
        <div class="ui centered green card" id="icms-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="icms-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="icms-statistic">
                    <div class="value" id="icms-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">ICMS</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="icms-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="icms-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="icms-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.icms', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- fundeb --}}
        <div class="ui centered green card" id="fundeb-placeholder">
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
                <div class="ui right floated disabled green button">Painel</div>
            </div>
        </div>

        <div class="ui centered green card" style="display: none" id="fundeb-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="fundeb-statistic">
                    <div class="value" id="fundeb-perc-excesso"></div>
                    <div class="label">% em relação ao previsto na LOA</div>
                </div>
            </div>
            <div class="content">
                <div class="header">FUNDEB</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="fundeb-arrecadado-anterior">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Ano Anterior
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic label" id="fundeb-previsto-loa">
                                    <span></span>
                                    <div class="detail"></div>
                                </div>
                            </div>
                            <div class="content">
                                Previsto na LOA
                            </div>
                        </div>
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui basic blue label" id="fundeb-arrecadado"></div>
                            </div>
                            <div class="content">
                                Arrecadado Acumulado
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button"
                    href="{{ route('receitas.fundeb', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>




    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.receitas.total', ['periodo' => $periodo]) }}', function(response) {
            // console.log(response);
            $('#total-placeholder').css('display', 'none');
            $('#total-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100).toLocaleString(
                'pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#total-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#total-statistic').addClass('green');
            } else {

            }
            $('#total-card').removeAttr('style');
            $('#total-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#total-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#total-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#total-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#total-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc * 100)
                .toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.correntes', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#correntes-placeholder').css('display', 'none');
            $('#correntes-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100).toLocaleString(
                'pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#correntes-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#correntes-statistic').addClass('green');
            } else {

            }
            $('#correntes-card').removeAttr('style');
            $('#correntes-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#correntes-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#correntes-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#correntes-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#correntes-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc * 100)
                .toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.propria', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#propria-placeholder').css('display', 'none');
            $('#propria-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100).toLocaleString(
                'pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#propria-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#propria-statistic').addClass('green');
            } else {

            }
            $('#propria-card').removeAttr('style');
            $('#propria-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#propria-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#propria-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#propria-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#propria-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc * 100)
                .toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.transfcorrentes', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#transfcorrentes-placeholder').css('display', 'none');
            $('#transfcorrentes-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#transfcorrentes-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#transfcorrentes-statistic').addClass('green');
            } else {

            }
            $('#transfcorrentes-card').removeAttr('style');
            $('#transfcorrentes-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#transfcorrentes-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentes-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#transfcorrentes-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentes-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc *
                100).toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.transfcorrentesbr', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#transfcorrentesbr-placeholder').css('display', 'none');
            $('#transfcorrentesbr-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#transfcorrentesbr-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#transfcorrentesbr-statistic').addClass('green');
            } else {

            }
            $('#transfcorrentesbr-card').removeAttr('style');
            $('#transfcorrentesbr-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#transfcorrentesbr-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesbr-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#transfcorrentesbr-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesbr-arrecadado-anterior>.detail').empty().text((response.data
                .dif_acum_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.transfcorrentesrs', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#transfcorrentesrs-placeholder').css('display', 'none');
            $('#transfcorrentesrs-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#transfcorrentesrs-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#transfcorrentesrs-statistic').addClass('green');
            } else {

            }
            $('#transfcorrentesrs-card').removeAttr('style');
            $('#transfcorrentesrs-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#transfcorrentesrs-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesrs-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#transfcorrentesrs-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesrs-arrecadado-anterior>.detail').empty().text((response.data
                .dif_acum_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.transfcorrentessaude', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#transfcorrentessaude-placeholder').css('display', 'none');
            $('#transfcorrentessaude-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#transfcorrentessaude-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#transfcorrentessaude-statistic').addClass('green');
            } else {

            }
            $('#transfcorrentessaude-card').removeAttr('style');
            $('#transfcorrentessaude-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString(
            'pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#transfcorrentessaude-previsto-loa>span').empty().text(response.data.previsto_loa_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentessaude-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc *
                100).toLocaleString('pt-BR') + '%');
            $('#transfcorrentessaude-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentessaude-arrecadado-anterior>.detail').empty().text((response.data
                .dif_acum_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.transfcorrenteseducacao', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#transfcorrenteseducacao-placeholder').css('display', 'none');
            $('#transfcorrenteseducacao-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#transfcorrenteseducacao-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#transfcorrenteseducacao-statistic').addClass('green');
            } else {

            }
            $('#transfcorrenteseducacao-card').removeAttr('style');
            $('#transfcorrenteseducacao-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrenteseducacao-previsto-loa>span').empty().text(response.data.previsto_loa_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrenteseducacao-previsto-loa>.detail').empty().text((response.data
                .dif_acum_arrec_prev_perc * 100).toLocaleString('pt-BR') + '%');
            $('#transfcorrenteseducacao-arrecadado-anterior>span').empty().text(response.data
                .arrecadado_anterior_acum.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrenteseducacao-arrecadado-anterior>.detail').empty().text((response.data
                .dif_acum_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.transfcorrentesassistencia', ['periodo' => $periodo]) }}', function(
            response) {
            console.log(response);
            $('#transfcorrentesassistencia-placeholder').css('display', 'none');
            $('#transfcorrentesassistencia-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc *
                100).toLocaleString('pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#transfcorrentesassistencia-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#transfcorrentesassistencia-statistic').addClass('green');
            } else {

            }
            $('#transfcorrentesassistencia-card').removeAttr('style');
            $('#transfcorrentesassistencia-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesassistencia-previsto-loa>span').empty().text(response.data.previsto_loa_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesassistencia-previsto-loa>.detail').empty().text((response.data
                .dif_acum_arrec_prev_perc * 100).toLocaleString('pt-BR') + '%');
            $('#transfcorrentesassistencia-arrecadado-anterior>span').empty().text(response.data
                .arrecadado_anterior_acum.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#transfcorrentesassistencia-arrecadado-anterior>.detail').empty().text((response.data
                .dif_acum_arrec_ant_perc * 100).toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.fpm', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#fpm-placeholder').css('display', 'none');
            $('#fpm-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100).toLocaleString(
                'pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#fpm-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#fpm-statistic').addClass('green');
            } else {

            }
            $('#fpm-card').removeAttr('style');
            $('#fpm-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#fpm-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#fpm-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#fpm-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#fpm-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc * 100)
                .toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.icms', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#icms-placeholder').css('display', 'none');
            $('#icms-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100).toLocaleString(
                'pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#icms-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#icms-statistic').addClass('green');
            } else {

            }
            $('#icms-card').removeAttr('style');
            $('#icms-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#icms-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#icms-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#icms-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum.toLocaleString(
                'pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#icms-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc * 100)
                .toLocaleString('pt-BR') + '%');
        });
    </script>

    <script type="module">
        loadData('{{ route('resources.receitas.fundeb', ['periodo' => $periodo]) }}', function(response) {
            console.log(response);
            $('#fundeb-placeholder').css('display', 'none');
            $('#fundeb-perc-excesso').empty().text((response.data.dif_acum_arrec_prev_perc * 100).toLocaleString(
                'pt-BR') + '%');
            if (response.data.dif_acum_arrec_prev_perc < 0) {
                $('#fundeb-statistic').addClass('red');
            } else if (response.data.dif_acum_arrec_prev_perc > 0) {
                $('#fundeb-statistic').addClass('green');
            } else {

            }
            $('#fundeb-card').removeAttr('style');
            $('#fundeb-arrecadado').empty().text(response.data.arrecadado_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#fundeb-previsto-loa>span').empty().text(response.data.previsto_loa_acum.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }));
            $('#fundeb-previsto-loa>.detail').empty().text((response.data.dif_acum_arrec_prev_perc * 100)
                .toLocaleString('pt-BR') + '%');
            $('#fundeb-arrecadado-anterior>span').empty().text(response.data.arrecadado_anterior_acum
                .toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
            $('#fundeb-arrecadado-anterior>.detail').empty().text((response.data.dif_acum_arrec_ant_perc * 100)
                .toLocaleString('pt-BR') + '%');
        });
    </script>
@endpush
