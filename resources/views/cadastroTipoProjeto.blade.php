@extends('layout')

@section('title', 'Cadastro de Tipo de Projeto')

@section('content')
    <h1>Cadastrar Novo Tipo de Projeto</h1>

    <form action="/tipos-projeto/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao_tipo">Descrição do Tipo</label>
            <input type="text" class="form-control" id="descricao_tipo" name="descricao_tipo" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
    </form>
@endsection
