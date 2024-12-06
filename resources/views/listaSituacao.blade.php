@extends('layout')

@section('title', 'Lista de Situações')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Situações</h1>

    <!-- Botão para cadastrar uma nova situação -->
    <a href="/situacoes/create" class="btn btn-success mb-3">Nova Situação</a>

    <!-- Tabela de situações com filtros -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <!-- Filtros de pesquisa -->
                    <form method="GET" action="{{ route('situacoes.index') }}">
                        <th>
                            <input type="text" name="descricao_situacao" class="form-control" placeholder="Buscar descrição" value="{{ request('descricao_situacao') }}">
                        </th>
                        <th>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Filtrar
                            </button>
                        </th>
                    </form>
                </tr>
            </thead>
            <tbody>
                @foreach ($situacoes as $situacao)
                    <tr>
                        <td class="text-center">{{ $situacao->descricao_situacao }}</td>
                        <td class="text-center">
                            <a href="/situacoes/edit/{{ $situacao->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="/situacoes/{{ $situacao->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
