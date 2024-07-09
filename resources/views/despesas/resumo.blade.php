@extends('app')

@section('dimensionName')
    Despesas
@endsection

@section('dimensionHref')
{{ route('despesas.resumo', ['periodo'=> $periodo]) }}
@endsection

{{-- @section('panelName')
    Resumo
@endsection --}}

@section('content')
    <div class="ui cards">

        {{-- total --}}
        <div class="ui centered red card" id="total-placeholder">
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
                    <div class="value" id="total-perc-receita"></div>
                    <div class="label">% em relação a receita</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Despesa Total</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                          <div class="right floated content">
                            <div class="ui basic label" id="total-rec">
                                <span></span>
                                <div class="detail"></div>
                            </div>
                          </div>
                          <div class="content">
                            Receita Total
                          </div>
                        </div>
                        <div class="item">
                          <div class="right floated content">
                            <div class="ui basic label" id="total-anterior">
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
                            <div class="ui basic blue label" id="total-empenhado"></div>
                          </div>
                          <div class="content">
                            Empenhado Acumulado
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button" href="{{ route('despesas.total', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>

        {{-- corrente --}}
        <div class="ui centered red card" id="corrente-placeholder">
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

        <div class="ui centered green card" style="display: none" id="corrente-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="corrente-statistic">
                    <div class="value" id="corrente-perc-receita"></div>
                    <div class="label">% em relação a receita</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Despesa Corrente</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                          <div class="right floated content">
                            <div class="ui basic label" id="corrente-rec">
                                <span></span>
                                <div class="detail"></div>
                            </div>
                          </div>
                          <div class="content">
                            Receita Corrente
                          </div>
                        </div>
                        <div class="item">
                          <div class="right floated content">
                            <div class="ui basic label" id="corrente-anterior">
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
                            <div class="ui basic blue label" id="corrente-empenhado"></div>
                          </div>
                          <div class="content">
                            Empenhado Acumulado
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button" href="{{ route('despesas.corrente', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>


        {{-- pessoal --}}
        <div class="ui centered red card" id="pessoal-placeholder">
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

        <div class="ui centered green card" style="display: none" id="pessoal-card">
            <div class="ui center aligned inverted segment">
                <div class="ui inverted statistic" id="pessoal-statistic">
                    <div class="value" id="pessoal-perc-receita"></div>
                    <div class="label">% em relação a receita</div>
                </div>
            </div>
            <div class="content">
                <div class="header">Despesa com Pessoal</div>
                <div class="description">
                    <div class="ui bottom aligned list">
                        <div class="item">
                          <div class="right floated content">
                            <div class="ui basic label" id="pessoal-rec">
                                <span></span>
                                <div class="detail"></div>
                            </div>
                          </div>
                          <div class="content">
                            Receita Corrente
                          </div>
                        </div>
                        <div class="item">
                          <div class="right floated content">
                            <div class="ui basic label" id="pessoal-anterior">
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
                            <div class="ui basic blue label" id="pessoal-empenhado"></div>
                          </div>
                          <div class="content">
                            Empenhado Acumulado
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="extra content">
                <a class="ui right floated green button" href="{{ route('despesas.pessoal', ['periodo' => $periodo]) }}">Painel</a>
            </div>
        </div>


    </div>
@endsection

@push('scripts')
    <script type="module">
        loadData('{{ route('resources.despesas.total', ['periodo' => $periodo]) }}', function(response) {
            // console.log(response);
            $('#total-placeholder').css('display', 'none');
            $('#total-perc-receita').empty().text((response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR') + '%');
            if(response.data.dif_emp_receita_acum_perc < 0) {
                $('#total-statistic').addClass('red');
            } else if(response.data.dif_emp_receita_acum_perc > 0) {
                $('#total-statistic').addClass('green');
            } else {

            }
            $('#total-card').removeAttr('style');
            $('#total-rec>span').empty().text(response.data.receita_total_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
            $('#total-rec>.detail').empty().text((response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR')+'%');
            $('#total-anterior>span').empty().text(response.data.emp_ant_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
            $('#total-anterior>.detail').empty().text((response.data.dif_emp_ant_acum_perc * 100).toLocaleString('pt-BR')+'%');
            $('#total-empenhado').empty().text(response.data.emp_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
        });

    </script>

    <script type="module">
        loadData('{{ route('resources.despesas.corrente', ['periodo' => $periodo]) }}', function(response) {
            // console.log(response);
            $('#corrente-placeholder').css('display', 'none');
            $('#corrente-perc-receita').empty().text((response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR') + '%');
            if(response.data.dif_emp_receita_acum_perc < 0) {
                $('#corrente-statistic').addClass('red');
            } else if(response.data.dif_emp_receita_acum_perc > 0) {
                $('#corrente-statistic').addClass('green');
            } else {

            }
            $('#corrente-card').removeAttr('style');
            $('#corrente-rec>span').empty().text(response.data.receita_corrente_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
            $('#corrente-rec>.detail').empty().text((response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR')+'%');
            $('#corrente-anterior>span').empty().text(response.data.emp_ant_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
            $('#corrente-anterior>.detail').empty().text((response.data.dif_emp_ant_acum_perc * 100).toLocaleString('pt-BR')+'%');
            $('#corrente-empenhado').empty().text(response.data.emp_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
        });

    </script>

    <script type="module">
        loadData('{{ route('resources.despesas.pessoal', ['periodo' => $periodo]) }}', function(response) {
            // console.log(response);
            $('#pessoal-placeholder').css('display', 'none');
            $('#pessoal-perc-receita').empty().text((response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR') + '%');
            if(response.data.dif_emp_receita_acum_perc < 0) {
                $('#pessoal-statistic').addClass('red');
            } else if(response.data.dif_emp_receita_acum_perc > 0) {
                $('#pessoal-statistic').addClass('green');
            } else {

            }
            $('#pessoal-card').removeAttr('style');
            $('#pessoal-rec>span').empty().text(response.data.receita_corrente_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
            $('#pessoal-rec>.detail').empty().text((response.data.dif_emp_receita_acum_perc * 100).toLocaleString('pt-BR')+'%');
            $('#pessoal-anterior>span').empty().text(response.data.emp_ant_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
            $('#pessoal-anterior>.detail').empty().text((response.data.dif_emp_ant_acum_perc * 100).toLocaleString('pt-BR')+'%');
            $('#pessoal-empenhado').empty().text(response.data.emp_acum.toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));
        });

    </script>


@endpush
