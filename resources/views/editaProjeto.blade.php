@extends('layout')

@section('title', 'Editar Projeto')

@section('content')
    <h1>Editar Projeto</h1>

    <form action="/projetos/update/{{ $projeto->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descricao_projeto">Descrição do Projeto</label>
            <input type="text" class="form-control" id="descricao_projeto" name="descricao_projeto" value="{{ $projeto->descricao_projeto }}" required>
        </div>

        <div class="form-group">
            <label for="mcmv">Minha Casa Minha Vida</label>
            <input type="checkbox" id="mcmv" name="mcmv" value="1" {{ $projeto->mcmv ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="tamanho">Tamanho</label>
            <input type="number" step="0.01" class="form-control" id="tamanho" name="tamanho" value="{{ $projeto->tamanho }}" required>
        </div>

        <div class="form-group">
            <label for="data_inicial">Data Inicial</label>
            <input type="date" class="form-control" id="data_inicial" name="data_inicial" value="{{ $projeto->data_inicial }}" required>
        </div>

        <div class="form-group">
            <label for="data_previsao">Data Previsão</label>
            <input type="date" class="form-control" id="data_previsao" name="data_previsao" value="{{ $projeto->data_previsao }}" required>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="{{ $projeto->valor }}" required>
        </div>

        <div class="form-group">
            <label for="id_cliente">Cliente</label>
            <select id="id_cliente" name="id_cliente" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $projeto->id_cliente ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_situacao">Situação</label>
            <select id="id_situacao" name="id_situacao" class="form-control" required>
                @foreach($situacoes as $situacao)
                    <option value="{{ $situacao->id }}" {{ $situacao->id == $projeto->id_situacao ? 'selected' : '' }}>{{ $situacao->descricao }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_tipo">Tipo de Projeto</label>
            <select id="id_tipo" name="id_tipo" class="form-control" required>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ $tipo->id == $projeto->id_tipo ? 'selected' : '' }}>{{ $tipo->descricao }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
        <a href="/projetos" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
@endsection
