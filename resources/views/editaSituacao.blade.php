@extends('layout')

@section('title', 'Edita Situação')

@section('content')
    <h1>Editar Situação</h1>

    <form action="/situacoes/update/{{$situacao->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descricao_situacao">Descrição da Situação</label>
            <input type="text" class="form-control" id="descricao_situacao" name="descricao_situacao" required value="{{$situacao->descricao_situacao}}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
@endsection
