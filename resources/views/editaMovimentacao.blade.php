@extends('layout')

@section('title', 'Editar Movimentação Financeira')

@section('content')
    <h1>Editar Movimentação Financeira</h1>

    <form action="/movimentacoes/update/{{ $movimentacao->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="entrada" {{ $movimentacao->tipo == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="saida" {{ $movimentacao->tipo == 'saida' ? 'selected' : '' }}>Saída</option>
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required value="{{ $movimentacao->valor }}">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required value="{{ $movimentacao->descricao }}">
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" required value="{{ $movimentacao->data }}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
@endsection
