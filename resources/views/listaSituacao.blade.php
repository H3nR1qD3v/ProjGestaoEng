@extends('layout')

@section('title', 'Lista de Situações')

@section('content')
    <h1>Lista de Situações</h1>

    <div class="mt-4">
        <a href="/situacoes/create" class="btn btn-primary">Cadastrar Nova Situação</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($situacoes as $situacao)
                    <tr>
                        <td>{{ $situacao->descricao_situacao }}</td>
                        <td>
                            <a href="/situacoes/edit/{{$situacao->id}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="/situacoes/{{ $situacao->id }}" method="POST" style="display:inline;">
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
