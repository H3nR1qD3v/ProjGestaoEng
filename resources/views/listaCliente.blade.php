@extends('layout')

@section('title', 'EngFlow - Clientes')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Clientes</h1>

    <!-- Botão para cadastrar um novo cliente -->
    <a href="/clientes/create" class="btn btn-success mb-3">Novo Cliente</a>

    <!-- Tabela de clientes com filtros -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Data Nascimento</th>
                    <th>Data Cadastro</th>
                    <th>Cidade</th> <!-- Nova coluna -->
                    <th>Rua</th>    <!-- Nova coluna -->
                    <th>Ações</th>
                </tr>
                <tr>
                    <!-- Filtros de pesquisa -->
                    <form method="GET" action="{{ route('clientes.index') }}">
                        <th>
                            <input type="text" name="nome" class="form-control" placeholder="Buscar nome" value="{{ request('nome') }}">
                        </th>
                        <th>
                            <input type="text" name="cpf" class="form-control" placeholder="Buscar CPF" value="{{ request('cpf') }}">
                        </th>
                        <th>
                            <input type="text" name="telefone" class="form-control" placeholder="Buscar telefone" value="{{ request('telefone') }}">
                        </th>
                        <th>
                            <input type="date" name="data_nascimento" class="form-control" value="{{ request('data_nascimento') }}">
                        </th>
                        <th>
                            <input type="date" name="data_cadastro" class="form-control" value="{{ request('data_cadastro') }}">
                        </th>
                        <th>
                            <input type="text" name="cidade" class="form-control" placeholder="Buscar cidade" value="{{ request('cidade') }}">
                        </th>
                        <th>
                            <input type="text" name="rua" class="form-control" placeholder="Buscar rua" value="{{ request('rua') }}">
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
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="text-center">{{ $cliente->nome }}</td>
                        <!-- Exibindo CPF com formatação -->
                        <td class="text-center">
                            {{ substr($cliente->cpf, 0, 3) . '.' . substr($cliente->cpf, 3, 3) . '.' . substr($cliente->cpf, 6, 3) . '-' . substr($cliente->cpf, 9, 2) }}
                        </td>
                        <!-- Exibindo Telefone com formatação -->
                        <td class="text-center">
                            {{ '(' . substr($cliente->telefone, 0, 2) . ') ' . substr($cliente->telefone, 2, 5) . '-' . substr($cliente->telefone, 7, 4) }}
                        </td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($cliente->data_cadastro)->format('d/m/Y') }}</td>
                        <!-- Exibindo cidade e rua -->
                        <td class="text-center">{{ $cliente->cidade }}</td>
                        <td class="text-center">{{ $cliente->rua }}</td>
                        <td class="text-center">
                            <a href="/clientes/edit/{{ $cliente->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="/clientes/{{ $cliente->id }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion()">
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
