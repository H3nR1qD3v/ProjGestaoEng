@extends('layout')

@section('title', 'Cadastro de Situação')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Cadastrar Nova Situação</h1>

    <form action="/situacoes/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao_situacao">Descrição da Situação</label>
            <input type="text" class="form-control" id="descricao_situacao" name="descricao_situacao" placeholder="Digite a descrição da situação" required>
        </div>
        <div class="mt-3">
            <!-- Botões de Ação -->
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="/situacoes" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
