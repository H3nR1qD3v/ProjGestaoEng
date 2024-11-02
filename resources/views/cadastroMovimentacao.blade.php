@extends('layout')

@section('title', 'Cadastrar Movimentação Financeira')

@section('content')
    <h1>Cadastrar Movimentação Financeira</h1>

    <form action="/movimentacoes" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
    </form>
@endsection
