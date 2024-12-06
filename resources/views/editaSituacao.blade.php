@extends('layout')

@section('title', 'Editar Situação')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Situação</h1>

    <form action="/situacoes/update/{{$situacao->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descricao_situacao">Descrição da Situação</label>
            <input type="text" class="form-control" id="descricao_situacao" name="descricao_situacao" placeholder="Digite a descrição da situação" required value="{{ $situacao->descricao_situacao }}">
        </div>
        <div class="mt-3">
            <!-- Botões de Ação -->
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="/situacoes" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
