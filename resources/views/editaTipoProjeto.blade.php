@extends('layout')

@section('title', 'Edita Tipo de Projeto')

@section('content')
    <h1>Editar Tipo de Projeto</h1>

    <form action="/tipos-projeto/update/{{$tipo->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descricao_tipo">Descrição do Tipo</label>
            <input type="text" class="form-control" id="descricao_tipo" name="descricao_tipo" required value="{{$tipo->descricao_tipo}}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
@endsection
