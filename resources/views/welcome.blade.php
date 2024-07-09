@extends('app')

{{-- @section('dimensionName')

@endsection

@section('dimensionHref')
{{ route('index', ['periodo' => $periodo]) }}
@endsection

@section('panelName')

@endsection --}}

@section('content')
<div class="ui segment">
    <h1 class="ui dividing header">
        <i class="tachometer alternate icon"></i>
        <div class="content">
          Índices & Indicadores
          <div class="sub header">Prefeitura</div>
        </div>
      </h1>

      <div class="ui info message">
        <p>Este sistema disponibiliza para consulta pública diversos índices consitucionais e legais e diferentes indicadores relacionados à receita, despesa, orçamentários e financeiros.</p>
      </div>

      <h3 class="ui header">
        <div class="content">
          Dimensões & Paineis
        </div>
      </h3>

      <div class="ui basic message">
        <p>Consulte as diferentes dimensões e paineis a partir da lista abaixo ou diretamente no menu <i class="sidebar icon"></i>.</p>
      </div>

      <div class="ui list">
        <div class="item">
          <i class="balance scale icon"></i>
          <div class="content">
            <a class="header" href="{{ route('indices.resumo') }}">Índices</a>
            <div class="description">Índices Constitucionais e Legais de observância obrigatória.</div>
          </div>
        </div>
        <div class="item">
          <i class="piggy bank icon"></i>
          <div class="content">
            <a class="header" href="{{ route('receitas.resumo') }}">Receitas</a>
            <div class="description">Principais receitas orçamentárias.</div>
          </div>
        </div>
        <div class="item">
          <i class="shopping cart icon"></i>
          <div class="content">
            <a class="header" href="{{ route('despesas.resumo') }}">Despesas</a>
            <div class="description">Principais despesas orçamentárias.</div>
          </div>
        </div>
        <div class="item">
          <i class="chart bar icon"></i>
          <div class="content">
            <a class="header" href="{{ route('indicadores.resumo') }}">Indicadores</a>
            <div class="description">Cojunto de indicadores gerenciais.</div>
          </div>
        </div>
      </div>
</div>
@endsection

@push('scripts')

@endpush
