@extends('layout')

@section('title', 'Lista de Projetos')

@section('content')
    <h1>Lista de Projetos</h1>

    <a href="/projetos/create" class="btn btn-primary mt-3">Cadastrar Novo Projeto</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Cliente</th>
                <th>Situação</th>
                <th>Tipo de Projeto</th>
                <th>Valor</th>
                <th>Data Inicial</th>
                <th>Data Previsão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projetos as $projeto)
                <tr>
                    <td>{{ $projeto->descricao_projeto }}</td>
                    <td>{{ $projeto->cliente->nome }}</td>
                    <td>{{ $projeto->situacao->descricao }}</td>
                    <td>{{ $projeto->tipoProjeto->descricao }}</td>
                    <td>{{ $projeto->valor }}</td>
                    <td>{{ \Carbon\Carbon::parse($projeto->data_inicial)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($projeto->data_previsao)->format('d/m/Y') }}</td>
                    <td>
                        <a href="/projetos/edit/{{ $projeto->id }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="/projetos/{{ $projeto->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
