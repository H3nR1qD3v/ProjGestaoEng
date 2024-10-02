@extends('layout') <!-- Referência ao layout -->

@section('title', 'Lista de Funcionários') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Lista de Funcionários</h1>

    <div class="mt-4">
        <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Cadastrar Novo funcionario</a> <!-- Botão para cadastrar funcionario -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>E-mail</th>
                    <th>Perfil de acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->cargo }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>{{ $funcionario->perfil_acesso }}</td>
                        <td>
                            <!-- Ações, como editar ou excluir -->
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;">
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
