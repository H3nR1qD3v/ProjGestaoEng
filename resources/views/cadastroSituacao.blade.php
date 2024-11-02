@extends('layout')

@section('title', 'Cadastro de Situação')

@section('content')
    <h1>Cadastrar Nova Situação</h1>

    <form action="/situacoes/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao_situacao">Descrição da Situação</label>
            <input type="text" class="form-control" id="descricao_situacao" name="descricao_situacao" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
    </form>
@endsection
