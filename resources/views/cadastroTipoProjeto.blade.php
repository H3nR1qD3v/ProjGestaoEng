@extends('layout')

@section('title', 'EngFlow - Cadastro Tipo de Projeto')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Cadastrar Novo Tipo de Projeto</h1>

    <form action="/tipos-projeto/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao_tipo">Descrição do Tipo</label>
            <input type="text" class="form-control" id="descricao_tipo" name="descricao_tipo" placeholder="Digite a descrição do tipo de projeto" required>
        </div>
        <div class="mt-3">
            <!-- Botões de Ação -->
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="/tipos-projeto" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
