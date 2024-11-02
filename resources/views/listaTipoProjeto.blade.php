@extends('layout')

@section('title', 'Lista de Tipos de Projeto')

@section('content')
    <h1>Lista de Tipos de Projeto</h1>

    <div class="mt-4">
        <a href="/tipos-projeto/create" class="btn btn-primary">Cadastrar Novo Tipo de Projeto</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Descrição do Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->descricao_tipo }}</td>
                        <td>
                            <a href="/tipos-projeto/edit/{{$tipo->id}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="/tipos-projeto/{{ $tipo->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
