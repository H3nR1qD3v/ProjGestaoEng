@extends('layout')

@section('title', 'Lista de Movimentações Financeiras')

@section('content')
    <h1>Lista de Movimentações Financeiras</h1>

    <a href="/movimentacoes/create" class="btn btn-primary mt-3">Cadastrar Nova Movimentação</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimentacoes as $movimentacao)
                <tr>
                    <td>{{ $movimentacao->tipo }}</td>
                    <td>{{ $movimentacao->valor }}</td>
                    <td>{{ $movimentacao->descricao }}</td>
                    <td>{{ \Carbon\Carbon::parse($movimentacao->data)->format('d/m/Y') }}</td>
                    <td>
                        <a href="/movimentacoes/edit/{{ $movimentacao->id }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="/movimentacoes/{{ $movimentacao->id }}" method="POST" style="display:inline;">
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
