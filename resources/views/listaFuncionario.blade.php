@extends('layout')

@section('title', 'EngFlow - Funcionários')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Funcionários</h1>

    <!-- Botão para cadastrar um novo funcionário -->
    <a href="/funcionarios/create" class="btn btn-success mb-3">Novo Funcionário</a>

    <!-- Tabela de funcionários com filtros -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Perfil de Acesso</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <!-- Filtros de pesquisa -->
                    <form method="GET" action="{{ route('funcionarios.index') }}">
                        <th>
                            <input type="text" name="nome" class="form-control" placeholder="Buscar nome" value="{{ request('nome') }}">
                        </th>
                        <th>
                            <input type="text" name="cargo" class="form-control" placeholder="Buscar cargo" value="{{ request('cargo') }}">
                        </th>
                        <th>
                            <input type="text" name="email" class="form-control" placeholder="Buscar email" value="{{ request('email') }}">
                        </th>
                        <th>
                            <select name="perfil_acesso" class="form-control">
                                <option value="">Todos</option>
                                <option value="admin" {{ request('perfil_acesso') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="funcionario" {{ request('perfil_acesso') == 'funcionario' ? 'selected' : '' }}>Funcionário</option>
                            </select>
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
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td class="text-center">{{ $funcionario->nome }}</td>
                        <td class="text-center">{{ $funcionario->cargo }}</td>
                        <td class="text-center">{{ $funcionario->email }}</td>
                        <td class="text-center">{{ strtoupper($funcionario->perfil_acesso) }}</td>
                        <td class="text-center">
                            <a href="/funcionarios/edit/{{ $funcionario->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="/funcionarios/{{ $funcionario->id }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion()">
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
<script>
    function confirmDeletion() {
        return confirm("Tem certeza que deseja excluir este cliente? Esta ação não pode ser desfeita.");
    }
</script>

@endsection
