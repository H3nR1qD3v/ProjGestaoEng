@extends('layout') <!-- Referência ao layout -->

@section('title', 'Lista de Funcionários') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Lista de Funcionários</h1>

    <div class="mt-4">
        <a href="/funcionarios/create" class="btn btn-primary">Cadastrar Novo Funcionário</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Perfil de Acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->cargo }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>{{ strtoupper($funcionario->perfil_acesso) }}</td>
                        <td>
                            <a href="/funcionarios/edit/{{ $funcionario->id }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="/funcionarios/{{ $funcionario->id }}" method="POST" style="display:inline;">
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
