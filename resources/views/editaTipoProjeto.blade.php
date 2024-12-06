@extends('layout')

@section('title', 'Editar Tipo de Projeto')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Tipo de Projeto</h1>

    <form action="/tipos-projeto/update/{{ $tipo->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descricao_tipo">Descrição do Tipo</label>
            <input type="text" class="form-control" id="descricao_tipo" name="descricao_tipo" placeholder="Digite a descrição do tipo" required value="{{ $tipo->descricao_tipo }}">
        </div>
        <div class="mt-3">
            <!-- Botões de Ação -->
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="/tipos-projeto" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
